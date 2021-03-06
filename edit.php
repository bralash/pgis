<?php
	require "php/conflict.php";
	$conflict  = new Conflict();
	$conflict_details = $conflict->getConflictWithId($_GET['conflict_id']);
?>
<!doctype html>
<html>

<head>
	<title>Edit Conflict</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/semantic.css" />
	<link rel="stylesheet" href="css/style.css" />
	<meta charset="utf-8" />
</head>

<body>
	<header>
		<a href="index.php" class="back-icon">
			<i class="icon home"></i> Back Home
		</a>
		<h1><?= $conflict_details['conf_name']?></h1>
		<a href="index.php" class="tech-icon">
			Print Page <i class="icon print"></i> 
		</a>
	</header>

	<section class="container wrapper">
		<form class="ui form main" action="php/conflict_controller.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="action" value="update"></input>
		<input type="hidden" name="conflict_id" value="<?=$_GET['conflict_id']?>"/>

			<h4 class="ui dividing header">Land Conflict Register</h4>
			<div class="fields">
				<div class="eight wide field">
					<label>Name of Conflict</label>
					<input name="conf_name" type="text" value="<?= $conflict_details['conf_name']?>" required="true" />
				</div>
				<div class="eight wide field">
					<label>Short Description</label>
					<input name="conf_description" type="text" required="true" value="<?= $conflict_details['conf_description']?>" />
				</div>
			</div>
			<h4 class="ui dividing header">Principal Actors</h4>
			<div class="fields">
				<div class="seven wide field">
					<label>Name (Plaintiff)</label>
					<input name="name_pln" type="text" value="<?= $conflict_details['name_pln']?>" />
				</div>
				<div class="three wide field">
					<label>Age (Plaintiff)</label>
					<input name="age_pln" type="text" value="<?= $conflict_details['age_pln']?>" />
				</div>
				<div class="six wide field">
					<label>Level of Education (Plaintiff)</label>
					<input name="edu_pln" type="text" value="<?= $conflict_details['edu_pln']?>" />
				</div>
			</div>
			<div class="fields">
				<div class="seven wide field">
					<label>Name (Defendant)</label>
					<input name="name_def" type="text" value="<?= $conflict_details['name_def']?>" />
				</div>
				<div class="three wide field">
					<label>Age (Defendant)</label>
					<input name="age_def" type="text" value="<?= $conflict_details['age_def']?>" />
				</div>
				<div class="six wide field">
					<label>Level of Education (Defendant)</label>
					<input name="edu_def" type="text" value="<?= $conflict_details['edu_def']?>" />
				</div>
			</div>

			<h4 class="ui dividing header">Secondary Actors</h4>
			<div class="fields">
				<div class="seven wide field">
					<label>Name (Plaintiff)</label>
					<input name="name_pln_sec" type="text" value="<?= $conflict_details['name_pln_sec']?>" />
				</div>
				<div class="three wide field">
					<label>Age (Plaintiff)</label>
					<input name="age_pln_sec" type="text" value="<?= $conflict_details['age_pln_sec']?>" />
				</div>
				<div class="six wide field">
					<label>Level of Education (Plaintiff)</label>
					<input name="edu_pln_sec" type="text" value="<?= $conflict_details['edu_pln_sec']?>" />
				</div>
			</div>
			<div class="fields">
				<div class="seven wide field">
					<label>Name (Defendant)</label>
					<input name="name_def_sec" type="text" value="<?= $conflict_details['name_def_sec']?>" />
				</div>
				<div class="three wide field">
					<label>Age (Defendant)</label>
					<input name="age_def_sec" type="text" value="<?= $conflict_details['age_def_sec']?>" />
				</div>
				<div class="six wide field">
					<label>Level of Education (Defendant)</label>
					<input name="edu_def_sec" type="text" value="<?= $conflict_details['edu_def_sec']?>" />
				</div>
			</div>

			<h4 class="ui dividing header">Position</h4>
			<div class="fields">
				<div class="eight wide field">
					<input name="pos_pln" type="text" placeholder="Plaintiff" value="<?= $conflict_details['pos_pln']?>" />
				</div>
				<div class="eight wide field">
					<input name="pos_def" type="text" placeholder="Defendant" value="<?= $conflict_details['pos_def']?>" />
				</div>
			</div>

			<h4 class="ui dividing header">Interests</h4>
			<div class="fields">
				<div class="eight wide field">
					<input name="interest_pln" type="text" placeholder="Plaintiff" value="<?= $conflict_details['interest_pln']?>" />
				</div>
				<div class="eight wide field">
					<input name="interest_def" type="text" placeholder="Defendant" value="<?= $conflict_details['interest_def']?>" />
				</div>
			</div>

			<h4 class="ui dividing header">Needs</h4>
			<div class="fields">
				<div class="eight wide field">
					<input name="needs_pln" type="text" placeholder="Plaintiff" value="<?= $conflict_details['needs_pln']?>" />
				</div>
				<div class="eight wide field">
					<input name="needs_def" type="text" placeholder="Defendant" value="<?= $conflict_details['needs_def']?>" />
				</div>
			</div>

			<h4 class="ui dividing header">Desires and Fears</h4>
			<div class="fields">
				<div class="eight wide field">
					<input name="df_pln" type="text" placeholder="Plaintiff" value="<?= $conflict_details['df_pln']?>" />
				</div>
				<div class="eight wide field">
					<input name="df_def" type="text" placeholder="Defendant" value="<?= $conflict_details['df_def']?>" />
				</div>
			</div>

			<h4 class="ui dividing header">Causes &amp; Conflict Manifestation</h4>
			<div class="fields">
				<div class="eight wide field">
					<label>Causes</label>
					<input name="causes" type="text" value="<?= $conflict_details['causes']?>" />
				</div>

				<div class="eight wide field">
					<label>Conflict Manifestation</label>
					<select name="conf_manifest" class="ui dropdown" data-value="<?= $conflict_details['conf_manifest']?>">
						<option value="0">Latent</option>
						<option value="1">Escalation</option>
						<option value="2">Emergence</option>
						<option value="3">Settlement</option>
					</select>
				</div>
			</div>

			<h4 class="ui dividing header">Title Search</h4>
			<div class="fields">
				<div class="eight wide field">
					<input name="tit_pln" type="text" placeholder="Plaintiff" value="<?= $conflict_details['tit_pln']?>" />
				</div>
				<div class="eight wide field">
					<input name="tit_def" type="text" placeholder="Defendant" value="<?= $conflict_details['tit_def']?>" />
				</div>
			</div>

			<h4 class="ui dividing header">Stakeholder Identification &amp; Potential Risk</h4>
			<div class="fields">
				<div class="six wide field">
					<label>Stakeholder Identification</label>
					<input name="stake_id" type="text" value="<?= $conflict_details['stake_id']?>" />
				</div>
				<div class="five wide field">
					<label>Potentials</label>
					<input name="pot" type="text" value="<?= $conflict_details['pot']?>" />
				</div>
				<div class="five wide field">
					<label>Risks</label>
					<input name="risk" type="text" value="<?= $conflict_details['risk']?>" />
				</div>
			</div>

			<h4 class="ui dividing header">Conflict Identification &amp; Economic Attraction</h4>
			<div class="fields">
				<div class="eight wide field">
					<label>Conflict Identification</label>
					<select name="conf_id" class="ui dropdown" data-value="<?= $conflict_details['conf_id']?>">
						<option value="0">Land Dispute</option>
						<option value="1">Boundary Dispute</option>
						<option value="2">Easement</option>
						<option value="3">Ethnic</option>
						<option value="4">Values</option>
						<option value="5">Leadership</option>
						<option value="6">Personality</option>
						<option value="7">Interests</option>
						<option value="8">Style</option>
						<option value="9">Relationship</option>
					</select>
				</div>
				<div class="eight wide field">
					<label>Economic Attraction</label>
					<select name="eco_attn" class="ui dropdown" data-value="<?= $conflict_details['eco_attn']?>">
						<option value="0">Oil/Gas</option>
						<option value="1">Mining</option>
						<option value="2">Beach</option>
						<option value="3">Tourism</option>
						<option value="4">Estate</option>
						<option value="5">Educational</option>
						<option value="6">Industrial</option>
						<option value="7">Recreational</option>
					</select>
				</div>
			</div>

			<h4 class="ui dividing header">Wish</h4>
			<div class="fields">
				<div class="eight wide field">
					<input name="wish_pln" type="text" placeholder="Plaintiff" value="<?= $conflict_details['wish_pln']?>" />
				</div>
				<div class="eight wide field">
					<input name="wish_def" type="text" placeholder="Defendant" value="<?= $conflict_details['wish_def']?>" />
				</div>
			</div>

			<h4 class="ui dividing header">Type &amp; Size of Land</h4>
			<div class="fields">
				<div class="six wide field">
					<label>Type of Land(Plaintiff)</label>
					<select name="land_type_pln" class="ui dropdown" data-value="<?= $conflict_details['land_type_pln']?>">
						<option value="0">State Acquired</option>
						<option value="1">Vested</option>
						<option value="2">Stool</option>
						<option value="3">Skin</option>
						<option value="4">Family/Clan</option>
						<option value="5">Private</option>
						<option value="6">Common Property</option>
					</select>
				</div>
				<div class="five wide field">
					<label>Type of Land(Defendant)</label>
					<select name="land_type_def" class="ui dropdown" data-value="<?= $conflict_details['land_type_def']?>">
						<option value="0">State Acquired</option>
						<option value="1">Vested</option>
						<option value="2">Stool</option>
						<option value="3">Skin</option>
						<option value="4">Family/Clan</option>
						<option value="5">Private</option>
						<option value="6">Common Property</option>
					</select>
				</div>
				<div class="five wide field">
					<label>Size of Land</label>
					<select name="land_size" class="ui dropdown" data-value="<?= $conflict_details['land_size']?>">
						<option value="0">Acres</option>
						<option value="1">Hectares</option>
					</select>
				</div>
			</div>

			<h4 class="ui dividing header">Type of Document &amp; Site Plan</h4>
			<div class="fields">
				<div class="eight wide field">
					<label>Type of Document (Plaintiff)</label>
					<select name="doc_type_pln" class="ui dropdown" data-value="<?= $conflict_details['doc_type_pln']?>">
						<option value="0">Indenture</option>
						<option value="1">Power of Attorney</option>
						<option value="2">Police Extract</option>
						<option value="3">Declaration</option>
						<option value="4">Historic</option>
						<option value="5">None</option>
					</select>
				</div>
				<div class="eight wide field">
					<label>Type of Site Plan (Plaintiff)</label>
					<select name="site_plan_pln" class="ui dropdown" data-value="<?= $conflict_details['site_plan_pln']?>">
						<option value="0">Cadastral</option>
						<option value="1">Compass</option>
						<option value="2">Layout</option>
						<option value="3">Historic</option>
						<option value="4">None</option>
					</select>
				</div>
			</div>
			<div class="fields">
				<div class="eight wide field">
					<label>Type of Document (Defendant)</label>
					<select name="doc_type_def" class="ui dropdown" data-value="<?= $conflict_details['doc_type_def']?>">
						<option value="0">Indenture</option>
						<option value="1">Power of Attorney</option>
						<option value="2">Police Extract</option>
						<option value="3">Declaration</option>
						<option value="4">Historic</option>
						<option value="5">None</option>
					</select>
				</div>
				<div class="eight wide field">
					<label>Type of Site Plan (Defendant)</label>
					<select name="site_plan_def" class="ui dropdown" data-value="<?= $conflict_details['site_plan_def']?>">
						<option value="0">Cadastral</option>
						<option value="1">Compass</option>
						<option value="2">Layout</option>
						<option value="3">Historic</option>
						<option value="4s">None</option>
					</select>
				</div>
			</div>

			<h4 class="ui dividing header">Date of Acquisition</h4>
			<div class="fields">
				<div class="five wide field">
					<label>Plaintiff</label>
					<input name="acq_day_pln" type="text" placeholder="Day" value="<?= $conflict_details['acq_day_pln']?>" />
				</div>
				<div class="six wide field">
					<label style="visibility: hidden">Plaintiff</label>
					<input name="acq_month_pln" type="text" placeholder="Month" value="<?= $conflict_details['acq_month_pln']?>" />
				</div>
				<div class="five wide field">
					<label style="visibility: hidden">Plaintiff</label>
					<input name="acq_year_pln" type="text" placeholder="Year" value="<?= $conflict_details['acq_year_pln']?>" />
				</div>
			</div>
			<div class="fields">
				<div class="five wide field">
					<label>Defendant</label>
					<input name="acq_day_def" type="text" placeholder="Day" value="<?= $conflict_details['acq_day_def']?>" />
				</div>
				<div class="six wide field">
					<label style="visibility: hidden">Defendant</label>
					<input name="acq_month_def" type="text" placeholder="Month" value="<?= $conflict_details['acq_month_def']?>" />
				</div>
				<div class="five wide field">
					<label style="visibility: hidden">Defendant</label>
					<input name="acq_year_def" type="text" placeholder="Year" value="<?= $conflict_details['acq_year_def']?>" />
				</div>
			</div>

			<h4 class="ui dividing header">Date of Settlement</h4>
			<div class="fields">
				<div class="five wide field">
					<label>Plaintiff</label>
					<input name="sett_day_pln" type="text" placeholder="Day" value="<?= $conflict_details['sett_day_pln']?>" />
				</div>
				<div class="six wide field">
					<label style="visibility: hidden">Plaintiff</label>
					<input name="sett_month_pln" type="text" placeholder="Month" value="<?= $conflict_details['sett_month_pln']?>" />
				</div>
				<div class="five wide field">
					<label style="visibility: hidden">Plaintiff</label>
					<input name="sett_year_pln" type="text" placeholder="Year" value="<?= $conflict_details['sett_year_pln']?>" />
				</div>
			</div>
			<div class="fields">
				<div class="five wide field">
					<label>Defendant</label>
					<input name="sett_day_def" type="text" placeholder="Day" value="<?= $conflict_details['sett_day_def']?>" />
				</div>
				<div class="six wide field">
					<label style="visibility: hidden">Defendant</label>
					<input name="sett_month_def" type="text" placeholder="Month" value="<?= $conflict_details['sett_month_def']?>" />
				</div>
				<div class="five wide field">
					<label style="visibility: hidden">Defendant</label>
					<input name="sett_year_def" type="text" placeholder="Year" value="<?= $conflict_details['sett_year_def']?>" />
				</div>
			</div>

			<h4 class="ui dividing header">Detail of Ownership</h4>
			<div class="fields allodial-group">
				<div class="eight wide field">
					<label>Plaintiff</label>
					<select name="owner_pln" class="ui dropdown name-owner-pln" data-value="<?= $conflict_details['owner_pln']?>">
						<option value="0">Allodial</option>
						<option value="1">Acquisition</option>
					</select>

					<select data-input="allodial" class="ui dropdown name-owner-pln" style="display:none">
						<option value="Settlement">Settlement</option>
						<option value="Inheritance">Inheritance</option>
						<option value="Conquers">Conquers</option>
					</select>
					<select data-input="acquisition" class="ui dropdown name-owner-pln" style="display:none">
						<option value="Freehold">Freehold</option>
						<option value="Transfer">Transfer</option>
						<option value="Gift">Gift</option>
						<option value="Assignment">Assignment</option>
						<option value="Lease">Lease</option>
					</select>
					<select data-input="lease" class="ui dropdown name-owner-pln" style="display:none">
						<option value="Head Lease">Head Lease</option>
						<option value="Sub Lease">Sub Lease</option>
						<option value="Under Lease">Under Lease</option>
					</select>
				</div>
				<div class="eight wide field">
					<label>Defendant</label>
					<select name="owner_def" class="ui dropdown name-owner-pln" data-value="<?= $conflict_details['owner_def']?>">
						<option value="0">Allodial</option>
						<option value="1">Acquisition</option>
					</select>
					<select data-input="allodial" class="ui dropdown name-owner-pln" style="display:none" id="">
						<option value="Settlement">Settlement</option>
						<option value="Inheritance">Inheritance</option>
						<option value="Conquers">Conquers</option>
					</select>
					<select data-input="acquisition" class="ui dropdown name-owner-pln" style="display:none" id="">
						<option value="Freehold">Freehold</option>
						<option value="Transfer">Transfer</option>
						<option value="Gift">Gift</option>
						<option value="Assignment">Assignment</option>
						<option value="Lease">Lease</option>
					</select>
					<select data-input="lease" class="ui dropdown name-owner-pln" style="display:none" id="">
						<option value="Head Lease">Head Lease</option>
						<option value="Sub Lease">Sub Lease</option>
						<option value="Under Lease">Under Lease</option>
					</select>
				</div>
			</div>

			<h4 class="ui dividing header">Locality</h4>
			<div class="fields">
				<div class="five wide field">
					<input name="town" type="text" placeholder="Town" value="<?= $conflict_details['town']?>" />
				</div>
				<div class="six wide field">
					<input name="district" type="text" placeholder="District" value="<?= $conflict_details['district']?>" />
				</div>
				<div class="five wide field">
					<input name="region" type="text" placeholder="Region" value="<?= $conflict_details['region']?>" />
				</div>
			</div>

			<h4 class="ui dividing header">Intermediaries</h4>
			<div class="field">
				<input name="intermediaries" type="text" placeholder="Intermediaries" value="<?= $conflict_details['intermediaries']?>" />
			</div>
			<h4 class="ui dividing header">Method of Termination</h4>
			<div class="fields">
				<div class="eight wide field">
					<label>Method of Termination(Plaintiff)</label>
					<select name="termination_method_pln" class="ui dropdown" data-value="<?= $conflict_details['termination_method_pln']?>">
						<option value="0">Expiry</option>
						<option value="1">Notice of Quit</option>
						<option value="2">Surrender</option>
						<option value="3">Merger</option>
						<option value="4">Disclaimer</option>
						<option value="5">Redemption</option>
						<option value="6">Enlargement</option>
						<option value="7">Frustration</option>
						<option value="8">Forfeiture</option>
					</select>
				</div>
				<div class="eight wide field">
					<label>Method of Termination(Defendant)</label>
					<select name="termination_method_def" class="ui dropdown" data-value="<?= $conflict_details['termination_method_def']?>">
						<option value="0">Expiry</option>
						<option value="1">Notice of Quit</option>
						<option value="2">Surrender</option>
						<option value="3">Merger</option>
						<option value="4">Disclaimer</option>
						<option value="5">Redemption</option>
						<option value="6">Enlargement</option>
						<option value="7">Frustration</option>
						<option value="8">Forfeiture</option>
					</select>
				</div>
			</div>
			<div class="fields">
				<div class="field seven">
					<div class="ui action input">
						<input placeholder="Choose file" id="ip" type="text" disabled="disabled"/>
						<button class="ui teal button brw icon" title="Browse">
							<i class="icon archive"></i>
						</button>
					</div>
					<input name="plot-image" type="file" id="upload-input" class="hidden-browse"/>
				</div>
			</div>
			<button type="submit" class="ui button blue right floated">Save</button>
		</form>
	</section>


	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/semantic.js"></script>
	<script src="js/new.js"></script>

	<script>
		$('[data-value]').each(function(){
			var value = $(this).data('value');
			var options = $(this).find('option');

			options.each(function(){
				if($(this).val() == value){
					$(this).prop('selected', true);
				}
			});
		});
	</script>

</body>

</html>