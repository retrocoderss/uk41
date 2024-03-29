<h2><?php echo lang('tr_export'); ?></h2>

<p class="intro"><?php echo lang('tr_export_note'); ?></p>

<?php echo form_open(current_url(), 'class="form-horizontal"'); ?>

	<div class="form-group">
		<label for="export_lang" class="control-label col-xs-2"><?php echo lang('tr_language') ?></label>
		<div class="col-xs-3">
			<select name="export_lang" id="export_lang" class="form-control">
			<?php foreach ($languages as $lang) :?>
				<option value="<?php e($lang) ?>" <?php echo isset($trans_lang) && $trans_lang == $lang ? 'selected="selected"' : '' ?>><?php e(ucfirst($lang)) ?></option>
			<?php endforeach; ?>
				<option value="other"><?php e(lang('tr_other')); ?></option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-2"><?php echo lang('tr_include') ?></label>
		<div class="col-xs-3">
			<label for="include_core">
				<input type="checkbox" id="include_core" name="include_core" value="1" checked="checked" />
				<?php echo lang('tr_include_core'); ?>
			</label>
			<label for="include_mods">
				<input type="checkbox" id="include_mods" name="include_mods" value="1" />
				<?php echo lang('tr_include_mods'); ?>
			</label>
		</div>
	</div>


	 <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="export" class="btn btn-primary" value="<?php e(lang('tr_export_short')); ?>" />
	</div>
</div>
<?php echo form_close(); ?>
