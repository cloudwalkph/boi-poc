@extends('layouts.auth')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div id="extensionImg" style="display: flex;align-items: center;">
				<div class="auth-overlay"></div>
				<div class="col-md-5 col-md-offset-1" style="z-index: 9999;color: #fff;">
					<h3 style="color: #fff;">TOURIST VISA EXTENSION</h3>
					<strong style="font-size: 25px;">Online Application Form</strong>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container" style="padding-top: 30px;">
				<p class="help-block">Please fill up this information sheet to verify your request for an appointment</p>
				<h5 style="margin: 25px 0;"><strong>APPLICATION INFORMATION</strong></h5>
			</div>
			<div class="container">
				<form>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Number of Months Requested">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Number of Months Stayed in the Philippines">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="row rowMargin">
								<div class="col-md-3">
									<div class="checkbox">
										<label>
											<input type="checkbox"> Pleasure
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="checkbox">
										<label>
											<input type="checkbox"> Health
										</label>
									</div>
								</div>
							</div>
							<div class="row rowMargin">
								<div class="col-md-3">
									<div class="checkbox">
										<label>
											<input type="checkbox"> Business
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="checkbox">
										<label>
											<input type="checkbox"> Others
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row rowMargin">
								<div class="col-md-6">
									<div class="checkbox">
										<label>
											<input type="checkbox"> With Valid Special Study Permit
										</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkbox">
										<label>
											<input type="checkbox"> With Other Pending Application
										</label>
									</div>
								</div>
							</div>
							<div class="row rowMargin">
								<div class="col-md-6">
									<div class="checkbox">
										<label>
											<input type="checkbox"> With Valid Provisional Work Permit
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Please specify your reason">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-12">
							<h6 style="margin: 25px 0;"><strong>Method of Application</strong></h6>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-3">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Personal
								</label>
							</div>
						</div>
						<div class="col-md-3">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Authorized Representative
								</label>
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Name of Authorized Representative">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="BI Accreditation Number">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-12">
							<h5 style="margin: 25px 0;"><strong>PERSONAL INFORMATION</strong></h5>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Last Name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="First/Given Name">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Middle Name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Other Name(s)/Alias(es)">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<a href="#" class="btn btn-primary btn-lg">ADD ANOTHER ALIAS</a>
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Date of Birth">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<select class="form-control">
									<option value="">Gender</option>
									<option value="1">Male</option>
									<option value="0">Female</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Country of Birth">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<select class="form-control">
									<option value="">Civil Status</option>
									<option value="married">Married</option>
									<option value="single">Single</option>
									<option value="meadow">Meadow</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Height (cm)">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Weight (kg)">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-12">
							<h5 style="margin: 25px 0;"><strong>RESIDENTIAL ADDRESS ABROAD</strong></h5>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-12 rowMargin">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="House/Unit No., Street, Subdivision/Village">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="City, State">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Country">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Zip Code">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-12">
							<h5 style="margin: 25px 0;"><strong>TRAVEL INFORMATION</strong></h5>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Passport Number">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="Date" value="" placeholder="Expiry Date/Valid Until">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-12">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Place of Insurance">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Date of Latest Arrival">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Flight Number">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-12">
							<h5 style="margin: 25px 0;"><strong>CHARACTER REFERENCES IN THE PHILIPPINES</strong></h5>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Last Name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="First/Given Name">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Middle Name">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-12">
							<h5 style="margin: 25px 0;"><strong>RESIDENTIAL ADDRESS IN THE PHILIPPINES</strong></h5>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-12 rowMargin">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="House/Unit No., Street, Subdivision/Village">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="City, State">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Zip code">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-12">
							<h5 style="margin: 25px 0;"><strong>CONTACT NUMBER(S) IN THE PHILIPPINES</strong></h5>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Landline">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Mobile">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Last Name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="First/Given Name">
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Middle Name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<a href="#" class="btn btn-primary btn-lg">ADD ANOTHER REFERENCE</a>
							</div>
						</div>
					</div>
					<div class="row rowMargin">
						<h5 class="text-center" style="margin: 25px 0;">CERTIFICATION</h5>
						<p class="text-center">I/We certify that: (1) All the information in the application is truthful, complete and correct: (2) All documents</p>
						<p class="text-center">are authentic and were legally obtained from the corresponding goverment agencies or private entities: (3) I/We</p>
						<p class="text-center">understand that my/our application may be summarily denied if: (a) Any statement if false; (b) Any document </p>
						<p class="text-center">Submitted is falsified; or (c) I/We fail to comply all the BI requirements without prejudice to whatever action the</p>
						<p class="text-center">BI may take; and (4) I/We have not filed this or any similar application before any office of the bureau.</p>
					</div>
					<div class="row rowMargin">
						<div class="col-md-4 col-md-offset-4">
							<a href="/schedule" class="btn btn-primary btn-lg btn-block">SUBMIT</a>
						</div>
					</div>
				</form>	
			</div>

		</div>
	</div>
@endsection