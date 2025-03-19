@extends('frontend.layout')

@section('content')
<div
        class="hero inner-page"
        style="background-image: url('{{ asset('frontend/images/changshindrone.png') }}')"
      >
        <div class="container">
         
        </div>
      </div>

      <div class="site-section bg-light">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
            @if(count($errors) > 0 )
        <div class="content-header mb-0 pb-0">
            <div class="container-fluid">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="p-0 m-0" style="list-style: none;">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        @if(session()->has('message'))
            <div class="content-header mb-0 pb-0">
                <div class="container-fluid">
                    <div class="mb-0 alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> 
                </div><!-- /.container-fluid -->
            </div>
        @endif
              <h2 class="section-heading"><strong>JJ Cars Arrangement</strong></h2>
              <div class="card p-5">
                <form action="{{ route('car.store') }}" method="post">
                    @csrf

                <!-- Language Toggle Button -->
                <div class="form-group row">
                    <label class="col-md-4 col-sm-12 col-form-label lang-label" data-en="Change Language" data-ko="언어 변경">Change Korean</label>
                    <div class="col-md-4 col-sm-12">    
                        <label class="switch">
                            <input type="checkbox" id="languageToggle">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>

                <!-- Rent Date & Time -->
                <div class="form-group row">
                    <label for="RENT_DATE" class="col-md-2 col-sm-12 col-form-label lang-label" data-en="Rent Date" data-ko="렌트 날짜">Rent Date</label>
                    <div class="col-md-4 col-sm-12">
                        <input type="text" name="RENT_DATE" id="RENT_DATE" class="form-control" readonly>
                    </div>
                    <label for="RENT_TIME" class="col-md-2 col-sm-12 col-form-label lang-label" data-en="Rent Time" data-ko="렌트 시간">Rent Time</label>
                    <div class="col-md-4 col-sm-12">
                        <input type="text" name="RENT_TIME" id="RENT_TIME" class="form-control" readonly>
                    </div>
                </div>

                <!-- Employee Info -->
                <div class="form-group row">
                    <label for="USER_EMPID" class="col-md-2 col-sm-12 col-form-label lang-label" data-en="Employee ID" data-ko="직원 ID">Employee ID</label>
                    <div class="col-md-4 col-sm-12">
                        <input type="text" name="USER_EMPID" id="USER_EMPID" class="form-control">
                    </div>
                    <label for="USER_NM" class="col-md-2 col-sm-12 col-form-label lang-label" data-en="Employee Name" data-ko="직원 이름">Employee Name</label>
                    <div class="col-md-4 col-sm-12">
                        <input type="text" name="USER_NM" id="USER_NM" class="form-control" readonly>
                    </div>
                </div>

                <!-- Department -->
                <div class="form-group">
                    <label for="USER_DEPT_NM" class="lang-label" data-en="Department" data-ko="부서">Department</label>
                    <select name="USER_DEPT_NM" class="form-control">
                        <option value="" disabled selected class="lang-label" data-en="Pilih salah satu" data-ko="하나 선택">Pilih salah satu</option>
                        <option value="IT-SOFTWARE" {{ old('USER_DEPT_NM') == 'IT-SOFTWARE' ? 'selected' : '' }}>IT-SOFTWARE</option>
                       
                    </select>
                </div>

                <!-- Usage Date Start & End -->
                <div class="form-group row">
                    <label for="PLAN_START_TIME" class="col-md-2 col-sm-12 col-form-label lang-label" data-en="Usage Date Start" data-ko="사용 시작 날짜">Usage Date Start</label>
                    <div class="col-md-4 col-sm-12">
                        <input type="datetime-local" name="PLAN_START_TIME" id="PLAN_START_TIME" class="form-control">
                    </div>
                    <label for="PLAN_END_TIME" class="col-md-2 col-sm-12 col-form-label lang-label" data-en="Usage Date End" data-ko="사용 종료 날짜">Usage Date End</label>
                    <div class="col-md-4 col-sm-12">
                        <input type="datetime-local" name="PLAN_END_TIME" id="PLAN_END_TIME" class="form-control">
                    </div>
                </div>

                <!-- Destination -->
                <div class="form-group">
                    <label for="DESTINATION" class="lang-label" data-en="Destination" data-ko="목적지">Destination</label>
                    <select name="DESTINATION" class="form-control">
                        <option value="" disabled selected class="lang-label" data-en="Pilih salah satu" data-ko="하나 선택">Pilih salah satu</option>
                        <option value="GOV" {{ old('DESTINATION') == 'GOV' ? 'selected' : '' }}>GOV</option>
                    </select>
                </div>

                <!-- Memo -->
                <div class="form-group">
                    <label for="DATA_MEMO" class="lang-label" data-en="Memo" data-ko="메모">Memo</label>
                    <textarea name="DATA_MEMO" id="DATA_MEMO" class="form-control" rows="4" placeholder="Write your detail destination here.."></textarea>
                </div>

                <!-- Num of Employees -->
                <div class="form-group row">
                    <label for="RENTAL_EMP_QTY" class="col-md-3 col-sm-12 col-form-label lang-label" data-en="Num of Emp" data-ko="직원 수">Num of Emp</label>
                    <div class="col-md-2 col-sm-12">
                        <input type="number" name="RENTAL_EMP_QTY" id="RENTAL_EMP_QTY" class="form-control" value="1" min="1">
                    </div>
                    <label class="col-md-3 col-sm-12 col-form-label lang-label" data-en="Min 3 Persons" data-ko="최소 3명">Min 3 Persons</label>
                </div>

                <!-- Passenger Memo -->
                <div class="form-group">
                    <label for="RENTAL_USED_DESC" class="lang-label" data-en="Passenger List" data-ko="승객 목록">Passenger List</label>
                    <textarea name="RENTAL_USED_DESC" id="RENTAL_USED_DESC" class="form-control" rows="4" placeholder="Write passenger details here.."></textarea>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status" class="lang-label" data-en="Status" data-ko="상태">Status</label>
                    <input type="text" name="status" value="W" class="form-control" id="status" readonly style="background-color: #0c0c0c; cursor: not-allowed;">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-block lang-label" data-en="Submit" data-ko="제출">Submit</button>
                </form>
                
                <!-- JavaScript to Auto Fill Date & Time -->
                <script>
                    window.onload = function() {
                        var date = new Date();
                        var formattedDate = date.toISOString().split('T')[0];
                        var formattedTime = date.toTimeString().split(' ')[0].slice(0, 5); // HH:MM format
                        
                        document.getElementById('RENT_DATE').value = formattedDate;
                        document.getElementById('RENT_TIME').value = formattedTime;
                    }
                </script>

                <!-- JavaScript for Language Toggle -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('languageToggle').addEventListener('change', function() {
            let labels = document.querySelectorAll('.lang-label');
            labels.forEach(label => {
                if (this.checked) {
                    label.textContent = label.getAttribute('data-ko'); // Change to Korean
                } else {
                    label.textContent = label.getAttribute('data-en'); // Change to English
                }
            });
        });
    });
</script>

<!-- Toggle Button CSS -->
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 25px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 25px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 4px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:checked + .slider:before {
        transform: translateX(24px);
    }
</style>
                
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
