<style>
	form { margin: 0; }
</style>
<div class="well">
	
	<?php echo form_open(current_url(), 'class="form-horizontal"'); ?>
			<div class="form-group">
			<label class="col-xs-2 control-label" ><?php e(lang('tr_current_lang')); ?></label>
		<div class="col-xs-3">
		<select name="trans_lang" id="trans_lang" class="form-control ">
		<?php foreach ($languages as $lang) :?>
			<option value="<?php e($lang) ?>" <?php echo isset($trans_lang) && $trans_lang == $lang ? 'selected="selected"' : '' ?>><?php e(ucfirst($lang)) ?></option>
		<?php endforeach; ?>
			<option value="other"><?php e(lang('tr_other')); ?></option>
		</select>
		</div></div>

		<input type="text" name="new_lang" id="new_lang" style="display: none" value="" />
	 <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="select_lang" class="btn btn-small btn-primary" value="<?php e(lang('tr_select_lang')); ?>" />
	</div></div>
	</form>
</div>

<!-- Core -->
<div class="admin-box">
	<h3><?php echo lang('tr_core') ?></h3>

<table class="table table-striped">

	<tbody>
	<?php foreach ($lang_files as $file) :?>
		<tr>
			<td>
				<a href="<?php echo site_url(SITE_AREA .'/developer/translate/edit/'. $trans_lang .'/'. $file) ?>">
					<?php e($file); ?>
				</a>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<!-- Modules -->
<div class="admin-box">
	<h3><?php e(lang('tr_modules')); ?></h3>

<table class="table table-striped">
	<tbody>
	<?php if (isset($modules) && is_array($modules) && count($modules)) : ?>
	<?php foreach ($modules as $file) :?>
		<tr>
			<td>
				<a href="<?php echo site_url(SITE_AREA .'/developer/translate/edit/'. $trans_lang .'/'. $file) ?>">
					<?php e($file); ?>
				</a>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php else : ?>
		<tr>
			<td>
				<div class="alert alert-info fade in">
					<a class="close" data-dismiss="alert">&times;</a>		
					<?php echo lang('tr_no_modules'); ?>
				</div>
			</td>
		</tr>
	<?php endif; ?>
	</tbody>
</table>
</div>
