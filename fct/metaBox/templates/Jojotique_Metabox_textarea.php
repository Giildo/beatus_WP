<div class="meta-box-item-title">
    <h4>
        <label for="<?= $field->getId() ?>"><?= $field->getLabel() ?></label>
    </h4>
</div>
<div class="meta-box-item-content">
	<textarea name="<?= $field->getId() ?>"
              id="<?= $field->getId() ?>"
              placeholder="<?= $field->getExampleValue() ?>"
              style="width: 100%;"><?= $field->getDefaultValue() ?></textarea>
</div>
<br/>