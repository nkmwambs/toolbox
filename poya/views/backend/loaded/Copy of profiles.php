<?php

$points = range(0, 10);
									
foreach($responses as $response){
?>
<div class="form-group">
						<div class="col-xs-12" style="text-align: center;">
							Check on the Profile Per Category to Nominate
						</div>
					</div>	
						
						<div class="form-group">
							<div class="col-xs-12">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="btn btn-icon btn-block" data-toggle="collapse" data-parent="#accordion-test" href="#category_physical">
											<i class="fa fa-folder"></i> 
											  Physical Category
										</a>
									</h4>
								</div>
								<div id="category_physical" class="panel-collapse collapse">
									<div class="panel-body">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>Write Up</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<textarea class="form-control" disabled="disabled" rows="25">
															<?php
														  		echo $response->physicalwriteup
														 	?>
														</textarea>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;">
														Supporting Video Link
													</td>
												</tr>
												<tr>
													<td>
														<a target="__blank" href="<?=$response->physicallink?>">Click here to view the video</a>
													</td>
												</tr>
												<!-- <tr>
													<td style="text-align: center;">
														Supporting Photos
													</td>
												</tr>
												<tr>
													<td>
														<a target="__blank" href="<?=$response->physicallink?>">Click here to view the photos</a>
													</td>
												</tr> -->
												<tr>
													<td style="text-align: center;">
														Nominate
													</td>
												</tr>
												<tr>
													
													<td>
														<select class="form-control">
															<option value=""><?=get_phrase('select_a_score');?></option>
															<?php
																foreach($points as $point){
															?>
																<option value="<?=$point?>"><?=$point?></option>
															<?php
																}
															?>
														</select>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
										
							</div>			
						</div>
						</div>	
						
						
						<div class="form-group">
							<div class="col-xs-12">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="btn btn-icon btn-block" data-toggle="collapse" data-parent="#accordion-test" href="#category_social">
											<i class="fa fa-folder"></i> 
											  Socio-Emotional Category
										</a>
									</h4>
								</div>
								<div id="category_social" class="panel-collapse collapse">
									<div class="panel-body">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>Write Up</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<textarea class="form-control" disabled="disabled" rows="25">
															<?php
														  		echo $response->socialwriteup
														 	?>
														</textarea>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;">
														Supporting Video Link
													</td>
												</tr>
												<tr>
													<td>
														<a target="__blank" href="<?=$response->sociallink?>">Click here to view the video</a>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;">
														Nominate
													</td>
												</tr>
												<tr>
													
													<td>
														<select class="form-control">
															<option value=""><?=get_phrase('select_a_score');?></option>
															<?php
																foreach($points as $point){
															?>
																<option value="<?=$point?>"><?=$point?></option>
															<?php
																}
															?>
														</select>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
										
							</div>			
						</div>
						</div>
						
						
						<div class="form-group">
							<div class="col-xs-12">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="btn btn-icon btn-block" data-toggle="collapse" data-parent="#accordion-test" href="#category_cognitive">
											<i class="fa fa-folder"></i> 
											  Cognitive Category
										</a>
									</h4>
								</div>
								<div id="category_cognitive" class="panel-collapse collapse">
									<div class="panel-body">
											<table class="table table-bordered">
											<thead>
												<tr>
													<th>Write Up</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<textarea class="form-control" disabled="disabled" rows="25">
															<?php
														  		echo $response->cognitivewriteup
														 	?>
														</textarea>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;">
														Supporting Video Link
													</td>
												</tr>
												<tr>
													<td>
														<a target="__blank" href="<?=$response->cognitivelink?>">Click here to view the video</a>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;">
														Nominate
													</td>
												</tr>
												<tr>
													
													<td>
														<select class="form-control">
															<option value=""><?=get_phrase('select_a_score');?></option>
															<?php
																foreach($points as $point){
															?>
																<option value="<?=$point?>"><?=$point?></option>
															<?php
																}
															?>
														</select>
													</td>
												</tr>
											</tbody>
										</table>	
									</div>
								</div>
										
							</div>			
						</div>
						</div>
						
						
						<div class="form-group">
							<div class="col-xs-12">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="btn btn-icon btn-block" data-toggle="collapse" data-parent="#accordion-test" href="#category_spiritual">
											<i class="fa fa-folder"></i> 
											  Spiritual Category
										</a>
									</h4>
								</div>
								<div id="category_spiritual" class="panel-collapse collapse">
									<div class="panel-body">
											<table class="table table-bordered">
											<thead>
												<tr>
													<th>Write Up</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<textarea class="form-control" disabled="disabled" rows="25">
															<?php
														  		echo $response->spiritualwriteup
														 	?>
														</textarea>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;">
														Supporting Video Link
													</td>
												</tr>
												<tr>
													<td>
														<a target="__blank" href="<?=$response->spirituallink?>">Click here to view the video</a>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;">
														Nominate
													</td>
												</tr>
												<tr>
													
													<td>
														<select class="form-control">
															<option value=""><?=get_phrase('select_a_score');?></option>
															<?php
																foreach($points as $point){
															?>
																<option value="<?=$point?>"><?=$point?></option>
															<?php
																}
															?>
														</select>
													</td>
												</tr>
											</tbody>
										</table>	
									</div>
								</div>
										
							</div>			
						</div>
						</div>
						
						<div class="form-group">
							<div class="col-xs-12">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="btn btn-icon btn-block" data-toggle="collapse" data-parent="#accordion-test" href="#category_caregiver">
											<i class="fa fa-folder"></i> 
											  Caregiver Empowerment Category
										</a>
									</h4>
								</div>
								<div id="category_caregiver" class="panel-collapse collapse">
									<div class="panel-body">
											<table class="table table-bordered">
											<thead>
												<tr>
													<th>Write Up</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<textarea class="form-control" disabled="disabled" rows="25">
															<?php
														  		echo $response->caregiverwriteup
														 	?>
														</textarea>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;">
														Supporting Video Link
													</td>
												</tr>
												<tr>
													<td>
														<a target="__blank" href="<?=$response->caregiverlink?>">Click here to view the video</a>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;">
														Nominate
													</td>
												</tr>
												<tr>
													
													<td>
														<select class="form-control">
															<option value=""><?=get_phrase('select_a_score');?></option>
															<?php
																foreach($points as $point){
															?>
																<option value="<?=$point?>"><?=$point?></option>
															<?php
																}
															?>
														</select>
													</td>
												</tr>
											</tbody>
										</table>	
									</div>
								</div>
										
							</div>			
						</div>
						</div>
						
						<div class="form-group">
							<div class="col-xs-12">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="btn btn-icon btn-block" data-toggle="collapse" data-parent="#accordion-test" href="#category_protection">
											<i class="fa fa-folder"></i> 
											  Child Protection Category
										</a>
									</h4>
								</div>
								<div id="category_protection" class="panel-collapse collapse">
									<div class="panel-body">
											<table class="table table-bordered">
											<thead>
												<tr>
													<th>Write Up</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<textarea class="form-control" disabled="disabled" rows="25">
															<?php
														  		echo $response->protectionwriteup
														 	?>
														</textarea>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;">
														Supporting Video Link
													</td>
												</tr>
												<tr>
													<td>
														<a target="__blank" href="<?=$response->protectionlink?>">Click here to view the video</a>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;">
														Nominate
													</td>
												</tr>
												<tr>
													
													<td>
														<select class="form-control">
															<option value=""><?=get_phrase('select_a_score');?></option>
															<?php
																foreach($points as $point){
															?>
																<option value="<?=$point?>"><?=$point?></option>
															<?php
																}
															?>
														</select>
													</td>
												</tr>
											</tbody>
										</table>	
									</div>
								</div>
										
							</div>			
						</div>
						</div>
<?php
}
?>						