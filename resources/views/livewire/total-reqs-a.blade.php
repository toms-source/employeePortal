<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <table>
        <thead>
            <th>total APPROVED leave||</th>
            <th>total APPROVED docu||</th>
            <th>total APPROVED loan||</th>
            <th>total APPROVED others||</th>
            <th>total APPROVED requests</th>
            
        </thead>

        <tbody>
                <td>{{$totalLeApp}}</td>
                <td>{{$totalDApp}}</td>
                <td>{{$totalLoApp}}</td>
                <td>{{$totalOApp}}</td>
                <td>{{$totalReqApp}}</td>
        </tbody>
    </table>
    <table>
        <thead>
            <th>total DENIED leave||</th>
            <th>total DENIED docu||</th>
            <th>total DENIED loan||</th>
            <th>total DENIED others||</th>
            <th>total DENIED requests</th>
            
        </thead>

        <tbody>
                <td>{{$totalLeDen}}</td>
                <td>{{$totalDDen}}</td>
                <td>{{$totalLoDen}}</td>
                <td>{{$totalODen}}</td>
                <td>{{$totalReqDen}}</td>
        </tbody>
    </table>
    <table>
        <thead>
            <th>total PENDING leave||</th>
            <th>total PENDING docu||</th>
            <th>total PENDING loan||</th>
            <th>total PENDING others||</th>
            <th>total PENDING requests</th>
            
        </thead>

        <tbody>
                <td>{{$totalLePen}}</td>
                <td>{{$totalDPen}}</td>
                <td>{{$totalLoPen}}</td>
                <td>{{$totalOPen}}</td>
                <td>{{$totalReqPen}}</td>
        </tbody>
        <table>
            <thead>
                <th>total leave||</th>
                <th>total docu||</th>
                <th>total loan||</th>
                <th>total others||</th>
                <th>total requests</th>
                
            </thead>
    
            <tbody>
                    <td>{{$totalLe}}</td>
                    <td>{{$totalD}}</td>
                    <td>{{$totalLo}}</td>
                    <td>{{$totalO}}</td>
                    <td>{{$totalReq}}</td>
            </tbody>
        </table>
    </table>
</div>
