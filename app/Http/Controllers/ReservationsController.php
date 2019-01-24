<?php

namespace App\Http\Controllers;

use App\Repositories\ButacaRepository;
use App\Repositories\ReservationRepository;
use App\Reservation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationsController extends Controller
{
    /**
     * @var ReservationRepository
     */
    protected $reservationRepository;
    /**
     * @var ButacaRepository
     */
    protected $butacaRepository;

    /**
     * ReservationsController constructor.
     * @param ReservationRepository $reservationRepository
     * @param ButacaRepository $butacaRepository
     */
    public function __construct(ReservationRepository $reservationRepository, ButacaRepository $butacaRepository)
    {
        $this->reservationRepository = $reservationRepository;
        $this->butacaRepository = $butacaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'persons' => 'required|numeric|min:1',
            'reserved_at' => 'required|date|after:today',
            'comments' => 'string',
            'butaca_id' => 'required|array',
            'butaca_id.*' => 'exists:butacas,id'
        ]);

        try {
            DB::beginTransaction();
            /** @var Reservation $reservation */
            $reservation = $this->reservationRepository->create([
                'user_id' => $request->user_id,
                'reserved_at' => $request->reserved_at,
                'persons' => $request->persons,
                'comments' => $request->comments,
                'butaca_id' => 'required|array',
                'butaca_id.*' => 'exists:butacas,id'
            ]);

            $reservation->butacas()->sync($request->butaca_id);

            $this->butacaRepository->disableButacasById($request->butaca_id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('reservations')
                ->withErrors($e->getMessage())
                ->withInput($request->all());
        }
        return redirect('reservations')->with('success', 'Reservation has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = $this->reservationRepository->getById($id);

        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = $this->reservationRepository->getById($id);
        return view('reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'persons' => 'required|numeric|min:1',
            'reserved_at' => 'required|date|after:tomorrow',
            'comments' => 'string',
            'butaca_id' => 'required|array',
            'butaca_id.*' => 'exists:butacas,id'
        ]);

        try {
            DB::beginTransaction();
            /** @var Reservation $reservation */
            $reservation = $this->reservationRepository->getById($id);

            $this->reservationRepository->update($reservation, [
                'user_id' => $request->user_id,
                'persons' => $request->persons,
                'reserved_at' => $request->reserved_at,
                'comments' => $request->comments
            ]);

            $butacas = $reservation->butacas->pluck('id')->toArray();

            $reservation->butacas()->sync($request->butaca_id);

            $this->butacaRepository->enableButacasById($butacas);

            $this->butacaRepository->disableButacasById($request->butaca_id);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('reservations')->withErrors($e->getMessage());
        }
        return redirect('reservations')->with('success', 'Reservation has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return bool
     * @throws Exception
     */
    public function destroy($id)
    {
        $reservation = $this->reservationRepository->getById($id);

        $butacas = $reservation->butacas->pluck('id')->toArray();

        $this->butacaRepository->enableButacasById($butacas);

        $this->reservationRepository->delete($reservation);

        return redirect('reservations')->with('success', 'Reservation has been deleted successfully.');
    }
}
