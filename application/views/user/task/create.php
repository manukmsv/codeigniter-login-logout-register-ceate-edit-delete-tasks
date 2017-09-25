<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($success)) : ?>
			<div class="col-md-12">
				<div class="alert alert-success" role="alert">
					<?= $success ?>
				</div>
			</div>
			<?php endif; ?>
		<div class="col-md-4" style="margin: 0 auto; float:none;">
			<div class="page-header">
				<h1><?=$edit_action ?> Task</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="name">Task Name</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter task name" value="<?=!empty($edit_task)?$edit_task->name:''; ?>">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" id="description" name="description"><?=!empty($edit_task)?$edit_task->description:''; ?></textarea>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="<?=$edit_action ?>">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->