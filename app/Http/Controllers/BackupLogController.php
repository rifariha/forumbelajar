<?php

namespace App\Http\Controllers;

use App\DataTables\BackupLogDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBackupLogRequest;
use App\Http\Requests\UpdateBackupLogRequest;
use App\Repositories\BackupLogRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BackupLogController extends AppBaseController
{
    /** @var  BackupLogRepository */
    private $backupLogRepository;

    public function __construct(BackupLogRepository $backupLogRepo)
    {
        $this->backupLogRepository = $backupLogRepo;
    }

    /**
     * Display a listing of the BackupLog.
     *
     * @param BackupLogDataTable $backupLogDataTable
     * @return Response
     */
    public function index(BackupLogDataTable $backupLogDataTable)
    {
        return $backupLogDataTable->render('backup_logs.index');
    }

    /**
     * Show the form for creating a new BackupLog.
     *
     * @return Response
     */
    public function create()
    {
        return view('backup_logs.create');
    }

    /**
     * Store a newly created BackupLog in storage.
     *
     * @param CreateBackupLogRequest $request
     *
     * @return Response
     */
    public function store(CreateBackupLogRequest $request)
    {
        $input = $request->all();

        $backupLog = $this->backupLogRepository->create($input);

        Flash::success('Backup Log saved successfully.');

        return redirect(route('backupLogs.index'));
    }

    /**
     * Display the specified BackupLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $backupLog = $this->backupLogRepository->find($id);

        if (empty($backupLog)) {
            Flash::error('Backup Log not found');

            return redirect(route('backupLogs.index'));
        }

        return view('backup_logs.show')->with('backupLog', $backupLog);
    }

    /**
     * Show the form for editing the specified BackupLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $backupLog = $this->backupLogRepository->find($id);

        if (empty($backupLog)) {
            Flash::error('Backup Log not found');

            return redirect(route('backupLogs.index'));
        }

        return view('backup_logs.edit')->with('backupLog', $backupLog);
    }

    /**
     * Update the specified BackupLog in storage.
     *
     * @param  int              $id
     * @param UpdateBackupLogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBackupLogRequest $request)
    {
        $backupLog = $this->backupLogRepository->find($id);

        if (empty($backupLog)) {
            Flash::error('Backup Log not found');

            return redirect(route('backupLogs.index'));
        }

        $backupLog = $this->backupLogRepository->update($request->all(), $id);

        Flash::success('Backup Log updated successfully.');

        return redirect(route('backupLogs.index'));
    }

    /**
     * Remove the specified BackupLog from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $backupLog = $this->backupLogRepository->find($id);

        if (empty($backupLog)) {
            Flash::error('Backup Log not found');

            return redirect(route('backupLogs.index'));
        }

        $this->backupLogRepository->delete($id);

        Flash::success('Backup Log deleted successfully.');

        return redirect(route('backupLogs.index'));
    }
}
