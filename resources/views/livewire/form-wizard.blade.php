<div class="container">
    <div class="row">
        <section>
            <div class="wizard">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="{{ $current_step == 'step_1'?'active':'disabled' }}">
                            <a  aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                Step 1
                            </span>
                            </a>
                        </li>

                        <li role="presentation" class="{{ $current_step == 'step_2'?'active':'disabled' }}">
                            <a  aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                Step 2
                            </span>
                            </a>
                        </li>

                        <li role="presentation" class="{{ $current_step == 'step_3'?'active':'disabled' }}">
                            <a  aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                Step 3
                            </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <form role="form">
                    <div class="tab-content">
                        <div class="tab-pane {{ $current_step == 'step_1'?'active':'' }}" role="tabpanel" id="step1">
                            <h3>Introduction</h3>
                            <p>Please fill out fields with <span style="color: red">*</span></p>
                            <div>
                                <div>
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" wire:model="first_name" required>
                                        @error('first_name')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" wire:model="last_name" required>
                                        @error('last_name')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" wire:model="address" required>
                                        @error('address')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" wire:model="city" required>
                                        @error('city')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" wire:model="country" required>
                                        @error('country')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4>Date of Birth</h4>
                            </div>
                            <div style="display: inline-flex;justify-content: space-between">
                                <div>
                                    <div class="form-group">
                                        <label for="dob_day">Day</label>
                                        <select type="text" wire:model="dob_day">
                                            <option >Select Date</option>
                                            @for($i =1;$i<=30;$i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('dob_day')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="dob_month">Month</label>
                                        <select type="text" wire:model="dob_month">
                                            <option >Select Month</option>

                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        @error('dob_month')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="dob_year">Year</label>
                                        <input type="text" wire:model="dob_year"/>
                                        @error('dob_year')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-primary" wire:click="nextStep('step_2')">Save
                                        and continue
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane {{ $current_step == 'step_2'?'active':'' }}" role="tabpanel" id="step2">
                            <h3>Martial Status</h3>
                            <p>Please fill out fields with <span style="color: red">*</span></p>
                            <div>
                                <div>
                                    <div class="form-group">
                                        <label for="marriage_status">Are you Married?</label>
                                        <select type="text" wire:model.live="marriage_status">
                                            <option>Select Marriage Status</option>
                                            <option value="yes">Married</option>
                                            <option value="no">Not Married</option>
                                        </select>
                                        @error('marriage_status')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                @if($marriage_status == 'yes')
                                    <div>
                                        <div class="form-group">
                                            <label for="marriage_country">Marriage Country</label>
                                            <input type="text" wire:model="marriage_country" required>
                                            @error('marriage_country')
                                            <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if($marriage_status == 'yes')
                                <div>
                                    <h4>Marriage Date</h4>
                                </div>
                                <div style="display: inline-flex;justify-content: space-between">
                                    <div>
                                        <div class="form-group">
                                            <label for="marriage_day">Day</label>
                                            <select type="text" wire:model="marriage_day">
                                                @for($i =1;$i<=30;$i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            @error('marriage_day')
                                            <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label for="marriage_month">Month</label>
                                            <select type="text" wire:model="marriage_month">
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                            @error('marriage_month')
                                            <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label for="marriage_year">Year</label>
                                            <input type="text" wire:model.blur="marriage_year"/>
                                            @error('marriage_year')
                                            <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @elseif($marriage_status == 'no')
                                <div>
                                    <div class="form-group">
                                        <label for="widow_status">Are you widowed?</label>
                                        <select type="text" wire:model.live="widow_status">
                                            <option>Are you widowed?</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                        @error('widow_status')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="past_marriage_status">Have you ever been married in the
                                            past?</label>
                                        <select type="text" wire:model.live="past_marriage_status">
                                            <option>Have you ever been married in the past?</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                        @error('past_marriage_status')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            @if(!empty($adult_error))
                                <p>
                                    {{ $adult_error }}
                                </p>
                            @endif
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-default prev-step"
                                            wire:click="nextStep('{{ $previous_step }}',true)">Previous
                                    </button>
                                </li>
                                <li>
                                    <button @if(!empty($adult_error)) disabled @else wire:click="nextStep('step_3')" @endif type="button" class="btn btn-primary next-step"
                                            >Save and continue
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane {{ $current_step == 'step_3'?'active':'' }}" role="tabpanel" id="complete">
                            <h3>Registration Completed Successfully</h3>
                            <p>You have successfully completed all steps.</p>
                            <p>Check your response below.</p>
                            <div>
                                <h3>Basic Introduction</h3>
                                First Name: <strong>{{ $first_name }}</strong>
                                <br>
                                Last Name: <strong>{{ $last_name }}</strong>
                                <br>
                                Address: <strong>{{ $address }}</strong>
                                <br>
                                City: <strong>{{ $city }}</strong>
                                <br>
                                Country: <strong>{{ $country }}</strong>
                                <br>
                                Date of Birth: <strong>{{ \Carbon\Carbon::parse($parsed_dob)->format("d M Y") }}</strong>
                            </div>
                            <div>
                                <h3>Martial Status</h3>
                                Married: <strong>{{ ucwords($marriage_status) }}</strong>
                                <br>
                                @if($marriage_status == 'yes')
                                    Country: <strong>{{ $marriage_country }}</strong>
                                    <br>
                                    Marriage Date: <strong>{{ \Carbon\Carbon::parse($parsed_marriage_date)->format("d M Y") }}  at age of {{ \Carbon\Carbon::parse($parsed_marriage_date)->diffInYears($parsed_dob) }}</strong>
                                @elseif($marriage_status == 'no')
                                    Are you widow: <strong>{{ ucwords($widow_status) }}</strong>
                                    <br>
                                    Ever Married: <strong>{{ ucwords($past_marriage_status) }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
