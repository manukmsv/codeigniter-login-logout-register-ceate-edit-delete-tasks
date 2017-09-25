<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>List Task</h1>
			</div>
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
			<table class="table">
				<thead>
					<th>Task Name</th>
					<th>Task Description</th>
					<th>Task Created</th>
					<th>Task Updated</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php foreach ($tasks as $task) { ?>
				<tr>
					<td><?php echo $task->name; ?></td>
					<td><?php echo $task->description; ?></td>
					<td><?php echo $task->dateCreated; ?></td>
					<td><?php echo $task->dateUpdated; ?></td>
					<td><a href="create/<?php echo $task->id; ?>">edit</a> / <a onClick="javascript:return (confirm('delete')?location.href='delete/<?php echo $task->id; ?>':'')">delete</a></td>
				</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div><!-- .row -->
</div><!-- .container -->