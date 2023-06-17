<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OtherRequests;
use App\Models\Payadvance;
use App\Models\LeaveRequest;
use App\Models\DocumentRequest;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class TotalReqsE extends Component
{
    use WithPagination;
    protected $listeners = ['newAdded' => 'refreshList','newApproved' => 'refreshList','newDenied' => 'refreshList','newDelete' => 'refreshList'];
    protected $paginationTheme = 'bootstrap';

    public function refreshList(){
        $this->resetPage();
    }

    
    public function render()
    {
        
        $user = Auth::user();
        $id = Auth::id();
        $user_id = "%" . $id . "%";

        $qLeave = LeaveRequest::query()
        ->where('user_id', 'like', $user_id)
        ->count();
        $qDocu = DocumentRequest::query()
        ->where('user_id', 'like', $user_id)
        ->count();
        $qLoan = Payadvance::query()
        ->where('user_id', 'like', $user_id)
        ->count();
        $qOther = OtherRequests::query()
        ->where('user_id', 'like', $user_id)
        ->count();
        $totalRequests = $qLeave + $qDocu + $qLoan + $qOther;

        $qLeaveApp = LeaveRequest::query()
        ->where('status', 'like', "%Approved%")
        ->where('user_id', 'like', $user_id)
        ->count();
        $qDocuApp = DocumentRequest::query()
        ->where('status', 'like', "%Approved%")
        ->where('user_id', 'like', $user_id)
        ->count();
        $qLoanApp = Payadvance::query()
        ->where('status', 'like', "%Approved%")
        ->where('user_id', 'like', $user_id)
        ->count();
        $qOtherApp = OtherRequests::query()
        ->where('status', 'like', "%Approved%")
        ->where('user_id', 'like', $user_id)
        ->count();
        $totalRequestsApp = $qLeaveApp + $qDocuApp + $qLoanApp + $qOtherApp;

        $qLeaveDen = LeaveRequest::query()
        ->where('status', 'like', "%Denied%")
        ->where('user_id', 'like', $user_id)
        ->count();
        $qDocuDen = DocumentRequest::query()
        ->where('status', 'like', "%Denied%")
        ->where('user_id', 'like', $user_id)
        ->count();
        $qLoanDen = Payadvance::query()
        ->where('status', 'like', "%Denied%")
        ->where('user_id', 'like', $user_id)
        ->count();
        $qOtherDen = OtherRequests::query()
        ->where('status', 'like', "%Denied%")
        ->where('user_id', 'like', $user_id)
        ->count();
        $totalRequestsDen = $qLeaveDen + $qDocuDen + $qLoanDen + $qOtherDen;

        $qLeavePen = LeaveRequest::query()
        ->where('status', 'like', "%Pending%")
        ->where('user_id', 'like', $user_id)
        ->count();
        $qDocuPen = DocumentRequest::query()
        ->where('status', 'like', "%Pending%")
        ->where('user_id', 'like', $user_id)
        ->count();
        $qLoanPen = Payadvance::query()
        ->where('status', 'like', "%Pending%")
        ->where('user_id', 'like', $user_id)
        ->count();
        $qOtherPen = OtherRequests::query()
        ->where('status', 'like', "%Pending%")
        ->where('user_id', 'like', $user_id)
        ->count();
        $totalRequestsPen = $qLeavePen + $qDocuPen + $qLoanPen + $qOtherPen;
        
        return view('livewire.total-reqs-e', [
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
