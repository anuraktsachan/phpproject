<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('config.php'); ?>

<?php
if (isset($_POST['submit'])) {	

	$tags 		= isset($_POST['tags']) ? $_POST['tags'] : '';
	
	

	$query = "INSERT INTO tags (tags) VALUES('$tags')";

	$result = mysqli_query($connection, $query)
		or die("Values cannot be Inserted" . mysqli_error($connection));
	}
?>		


	


		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			
				
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Tags</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Manage</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Add</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						
						
						<table>
							
							<thead>

							
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
							<th>ID</th>
							<th>TAGS</th>							
							<th>ACTION</th>
							</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>
										
										<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>



							<?php
						$query = 'SELECT * FROM tags';
						$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

						if ($result->num_rows > 0) :

							while ($row = $result->fetch_assoc()) :

						?>		



								<tr>
									<td><input type="checkbox" /></td>
									<td><?php echo $row['id']; ?></td>
									<td><?php echo $row['tags']; ?></td>
									
									<td>
										<!-- Icons -->
										<a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										<a <?php echo "href='delete.php?id=" . $row['id'] . "'" ?> title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
										<a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>

								<?php
							endwhile;
						endif;
						?>
								
					
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
					
					<form action="#" method="post">
						
						<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
							
							<p>
								<label>Tags</label>
									<input class="text-input small-input" type="text" id="tags" name="tags" />  <!-- Classes for input-notification: success, error, information, attention -->
							</p>
							
														
													
							
							<p>
								<input class="button" type="submit" name="submit" value="Add" />
							</p>
							
						</fieldset>
						
						<div class="clear"></div><!-- End .clear -->
						
					</form>
					
				</div> <!-- End #tab2 -->  
						
					    
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			
			
			
			<!-- Start Notifications -->
			<!--
			
			<div class="notification attention png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
				</div>
			</div>
			
			<div class="notification information png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification success png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification error png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div> -->
			
			<!-- End Notifications -->
			
			<?php include('footer.php'); ?>