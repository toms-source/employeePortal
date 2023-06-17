<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OtherRequests;
use App\Models\Payadvance;
use App\Models\LeaveRequest;
use App\Models\DocumentRequest;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class TotalReqsA extends Component
{ 
    use WithPagination;
    protected $listeners = ['newAdded' => 'refreshList','newApproved' => 'refreshList','newDenied' => 'refreshList','newDelete' => 'refreshList'];
    protected $paginationTheme = 'bootstrap';

    public function refreshList(){
        $this->resetPage();
    }

    public function render()
    {
        
        $qLeave = LeaveRequest::query()
        ->count();
        $qDocu = DocumentRequest::query()
        ->count();
        $qLoan = Payadvance::query()
        ->count();
        $qOther = OtherRequests::query()
        ->count();
        $totalRequests = $qLeave + $qDocu + $qLoan + $qOther;

        $qLeaveApp = LeaveRequest::query()
        ->where('status', 'like', "%Approved%")
        ->count();
        $qDocuApp = DocumentRequest::query()
        ->where('status', 'like', "%Approved%")
        ->count();
        $qLoanApp = Payadvance::query()
        ->where('status', 'like', "%Approved%")
        ->count();
        $qOtherApp = OtherRequests::query()
        ->where('status', 'like', "%Approved%")
        ->count();
        $totalRequestsApp = $qLeaveApp + $qDocuApp + $qLoanApp + $qOtherApp;

        $qLeaveDen = LeaveRequest::query()
        ->where('status', 'like', "%Denied%")
        ->count();
        $qDocuDen = DocumentRequest::query()
        ->where('status', 'like', "%Denied%")
        ->count();
        $qLoanDen = Payadvance::query()
        ->where('status', 'like', "%Denied%")
        ->count();
        $qOtherDen = OtherRequests::query()
        ->where('status', 'like', "%Denied%")
        ->count();
        $totalRequestsDen = $qLeaveDen + $qDocuDen + $qLoanDen + $qOtherDen;

        $qLeavePen = LeaveRequest::query()
        ->where('status', 'like', "%Pending%")
        ->count();
        $qDocuPen = DocumentRequest::query()
        ->where('status', 'like', "%Pending%")
        ->count();
        $qLoanPen = Payadvance::query()
        ->where('status', 'like', "%Pending%")
        ->count();
        $qOtherPen = OtherRequests::query()
        ->where('status', 'like', "%Pending%")
        ->count();
        $totalRequestsPen = $qLeavePen + $qDocuPen + $qLoanPen + $qOtherPen;
        
        return view('livewire.total-reqs-a', [
            'totalD' => $qDocu,
            'totalLe' => $qLeave,
            'totalLo' => $qLoan,
            'totalO' => $qOther,
            'totalReq' => $totalRequests,
            //,['*'],'docu'
            'totalDApp' => $qDocuApp,
            'totalLeApp' => $qLeaveApp,
            'totalLoApp' => $qLoanApp,
            'totalOApp' => $qOtherApp,
            'totalReqApp' => $totalRequestsApp,
            //,['*'],'docu'
            'totalDDen' => $qDocuDen,
            'totalLeDen' => $qLeaveDen,
            'totalLoDen' => $qLoanDen,
            'totalODen' => $qOtherDen,
            'totalReqDen' => $totalRequestsDen,
            //,['*'],'docu'
            'totalDPen' => $qDocuPen,
            'totalLePen' => $qLeavePen,
            'totalLoPen' => $qLoanPen,
            'totalOPen' => $qOtherPen,
            'totalReqPen' => $totalRequestsPen,
            //,['*'],'docu'
        ]);
    }
}
