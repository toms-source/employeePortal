<div>
    <div class="card">
        <div class="card-body">
            <div class="card-title"><h3> Add Salary </h3></div>
            @if (session()->has('message'))
            <div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form wire:submit.prevent="addSalary" method="POST">
            @csrf
    
            <div class="mb-1 ml-3 mr-3">
                <label for="name" class="form-label mt-3">Salary Name</label>
                <input wire:model="nameS" type="text" name="name" class="form-control" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="mb-1 ml-3 mr-3">
                <label for="description" class="form-label mt-3">Desciption</label>
                <input wire:model="descriptionS" type="text" name="description" class="form-control" required>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="mb-1 ml-3 mr-3">
                <label for="daily_rate" class="form-label">Daily Rate</label>
                <input wire:model="daily_rateS" type="number" name="daily_rate" class="form-control" required>
                @error('daily_rate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="mb-1 ml-3 mr-3">
                <label for="hourly_rate" class="form-label">Hourly Rate</label>
                <input wire:model="hourly_rateS" type="number" name="hourly_rate" class="form-control" required>
                @error('hourly_rate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="tax_bir" class="form-label">BIR Tax</label>
                <input wire:model="tax_birS" type="number" name="tax_bir" class="form-control" required>
                @error('tax_bir')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="tax_sss" class="form-label">SSS Tax</label>
                <input wire:model="tax_sssS" type="number" name="tax_sss" class="form-control" required>
                @error('tax_sss')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="tax_phealth" class="form-label">PhilHealth Tax</label>
                <input wire:model="tax_phealthS" type="number" name="tax_phealth" class="form-control" required>
                @error('tax_phealth')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="tax_pibig" class="form-label">Pag-ibig Tax</label>
                <input wire:model="tax_pibigS" type="number" name="tax_pibig" class="form-control" required>
                @error('tax_pibig')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="ot_rate" class="form-label">OT Rate</label>
                <input wire:model="ot_rateS" type="number" name="ot_rate" class="form-control" required>
                @error('ot_rate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="allowance" class="form-label">Allowance</label>
                <input wire:model="allowanceS" type="number" name="allowance" class="form-control" required>
                @error('allowance')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <!-- Add more input fields as needed -->
    
            <button type="submit" class="btn btn-primary ml-3">Add Salary</button>
        </form>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title"><h3> Salaries Table</h3></div>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>description</th>
                            <th>daily_rate</th>
                            <th>hourly_rate</th>
                            <th>tax_bir</th>
                            <th>tax_sss</th>
                            <th>tax_phealth</th>
                            <th>tax_pibig</th>
                            <th>ot_rate</th>
                            <th>allowance</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salaryTypes as $salaryTypess)
                        @if($salaryTypess->id == 1)
                            @continue
                        @endif
                        <tr>
                            <td>{{ $salaryTypess->name }}</td>
                            <td>{{ $salaryTypess->description }}</td>
                            <td>{{ $salaryTypess->daily_rate }}</td>
                            <td>{{ $salaryTypess->hourly_rate }}</td>
                            <td>{{ $salaryTypess->tax_bir }}</td>
                            <td>{{ $salaryTypess->tax_sss }}</td>
                            <td>{{ $salaryTypess->tax_phealth }}</td>
                            <td>{{ $salaryTypess->tax_pibig }}</td>
                            <td>{{ $salaryTypess->ot_rate }}</td>
                            <td>{{ $salaryTypess->allowance }}</td>
                            <td>
                                <button class="fa fa-edit border-0" data-target="#editEmployee" type="button" data-toggle="modal" wire:click="editEmployees({{ $salaryTypess->id }})"></button>
                                <a><i class="fa-solid fa-trash-can"style="color: #e61919;" wire:click="deleteEmpTry({{$salaryTypess->id}})"></i></a>
                            </td>
        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
  
        
    </div>
    <div class="modal fade" id="deleteEmployee" tabindex="-1" role="dialog"
    aria-labelledby="ordinanceAddedModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ordinanceAddedModalLabel">Employee Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Employee?
                </div>
                <div class="modal-footer">
                    <button type="button" class="px-5 btn btn-outline-danger" data-dismiss="modal" wire:click='deleteEmpConfirm()'>Yes</button>
                    <button type="button" class="px-5 btn btn-outline-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function() {
        window.livewire.on('deleteEmployee',() =>{
            console.log('ordinanceAdded event received');

            // document.getElementById('ordinanceDelete').classList.remove('show');
            // document.body.classList.remove('modal-open');
            // document.getElementsByClassName('modal-backdrop')[0].remove();

            var modalOrdinanceAdded = new bootstrap.Modal(document.getElementById(
                'deleteEmployee'));
            modalOrdinanceAdded.show();
        });
    });
</script>