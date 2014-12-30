<div class="row">
	<div class="col-md-12">
		<div class="tabbable tabbable-custom tabbable-full-width">
			<ul class="nav nav-tabs">
				<li class="active">
					<a data-toggle="tab" href="#tab_box"> Wyszukaj pudła</a>
				</li>
				<li>
					<a data-toggle="tab" href="#tab_document"> Wyszukaj dokument</a>
				</li>
			</ul>
		
			<div class="tab-content">
				<div id="tab_box" class="tab-pane">
					<h4>Dane pudła</h4>
							<form class="form-inline" role="form" action="/warehouse/boxes_search" method="POST" id="search_box_form">
								<div class="form-group">
									<label class="sr-only" for="exampleInputtext2">Numer</label>
									<input type="text" class="form-control" id="box_id" placeholder="Numer">
								</div>
								<div class="form-group">
									<label class="sr-only" for="exampleInputtext2">Magazyn</label>
									<input type="text" class="form-control" id="warehouse_id" placeholder="Magazyn">
								</div>
								<div class="form-group">
									<label class="sr-only" for="exampleInputtext2">Kategoria przechowywania</label>
									<input type="text" class="form-control" id="storage_category_id" placeholder="Kategoria przechowywania">
								</div>
								<div class="form-group">
									<label class="sr-only" for="exampleInputtext2">Data początku magazynowania</label>
									<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" id="date_from" placeholder="Data od">
								</div>
								<div class="form-group">
									<label class="sr-only" for="exampleInputtext2">Data końca magazynowania</label>
									<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" id="date_to" placeholder="Data do">
								</div>
								<div class="form-group">
									<label class="sr-only" for="exampleInputtext2">Data odbioru</label>
									<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" id="date_reception" placeholder="Data odbioru">
								</div>
								<div class="form-group">
									<label class="sr-only" for="exampleInputtext2">Blokady</label>
									<input type="text" class="form-control" id="lock" placeholder="Blokady">
								</div>
								<div class="form-group">
									<label class="sr-only" for="exampleInputtext2">Plomby</label>
									<input type="text" class="form-control" id="seal" placeholder="Plomby">
								</div>
								<button type="submit" class="btn green">
									Szukaj &nbsp; <i class="m-icon-swapright m-icon-white"></i>
								</button>
								
							</form>
							<br>
							<br>
					
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-advance table-hover">
									<thead>
									<tr>
										<th>
											 Numer
										</th>
										<th>
											 Magazyn
										</th>
										<th>
											 Kategoria przechowywania
										</th>							
										<th>
											 Data początku magazynowania
										</th>
										<th>
											 Data końca magazynowania
										</th>
										<th>
											 Data odbioru
										</th>							
										<th>
											Blokady
										</th>
										<th>
											 Plomby
										</th>
										<th>
											 Opcje
										</th>
									</tr>
									</thead>
									<tbody>
									
							<tr>
								<td>
									 ID
								</td>
								<td>
									 warehause->name
								</td>
								<td>
									 storagecategory->name
								</td>			
								<td>
									 box->date_from
								</td>
								<td>
									 box->date_to
								</td>
								<td>
									 box->date_reception
								</td>
								<td>
									 box->lock
								</td>
								<td>
									 box->seal
								</td>
								
								<td>
									opcje
								</td>
							</tr>
							
									</tbody>
									</table>
								</div>
								<div class="margin-top-20">
									<ul class="pagination">
										<li>
											<a href="#">
											Prev </a>
										</li>
										<li>
											<a href="#">
											1 </a>
										</li>
										<li>
											<a href="#">
											2 </a>
										</li>
										<li class="active">
											<a href="#">
											3 </a>
										</li>
										<li>
											<a href="#">
											4 </a>
										</li>
										<li>
											<a href="#">
											5 </a>
										</li>
										<li>
											<a href="#">
											Next </a>
										</li>
									</ul>
								</div>
							</div>
							<!--end tab-pane-->
				<!--end tab-pane-->
				<div id="tab_document" class="tab-pane active">
					<div class="row">
						<div class="col-md-8">
							<div class="booking-search">
								<h4>Dane dokumentu</h4>
							<form class="form-inline" role="form" action="/warehouse/boxes_search#tab_document" method="POST" id="search_document_form">
								<div class="form-group">
									<label class="sr-only" for="exampleInputtext2">Numer</label>
									<input type="text" class="form-control" id="document_id" placeholder="Numer">
								</div>
								<div class="form-group">
									<label class="sr-only" for="exampleInputtext2">Nazwa</label>
									<input type="text" class="form-control" id="name" placeholder="Nazwa">
								</div>
								<div class="form-group">
									<label class="sr-only" for="exampleInputtext2">opis</label>
									<input type="text" class="form-control" id="description" placeholder="Opis">
								</div>
								<button type="submit" class="btn green">
									Szukaj &nbsp; <i class="m-icon-swapright m-icon-white"></i>
								</button>
								
							</form>
							<br>
							<br>
					
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-advance table-hover">
									<thead>
									<tr>
										<th>
											 Numer
										</th>
										<th>
											 Nazwa
										</th>
										<th>
											 Opis
										</th>							
									</tr>
									</thead>
									<tbody>
										<?php foreach ($documents as $document):?>
										<tr>
											<td style="width:10%">
												 <?php echo $document->id;?>
											</td>
											<td style="width:20%">
												 <?php echo $document->name;?>
											</td>
																		
											<td style="width:50%">
												 <?php echo $document->description;?>
											</td>
											
										</tr>
										<?php endforeach;?>
									</tbody>
									</table>
								</div>
								<div class="margin-top-20">
									<ul class="pagination">
										<li>
											<a href="#">
											Prev </a>
										</li>
										<li>
											<a href="#">
											1 </a>
										</li>
										<li>
											<a href="#">
											2 </a>
										</li>
										<li class="active">
											<a href="#">
											3 </a>
										</li>
										<li>
											<a href="#">
											4 </a>
										</li>
										<li>
											<a href="#">
											5 </a>
										</li>
										<li>
											<a href="#">
											Next </a>
										</li>
									</ul>
								</div>
							</div>
				<!--end tab-pane-->
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
					