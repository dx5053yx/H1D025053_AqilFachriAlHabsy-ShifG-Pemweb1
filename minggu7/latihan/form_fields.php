<?php foreach ($definition["fields"] as $name => $field): ?>
    <p>
        <label for="<?php echo escape_html($name); ?>"><?php echo escape_html($field["label"]); ?></label><br>
        <?php if ($field["type"] === "textarea"): ?>
            <textarea
                id="<?php echo escape_html($name); ?>"
                name="<?php echo escape_html($name); ?>"
                rows="6"
                <?php if (isset($field["maxlength"])): ?>maxlength="<?php echo (int) $field["maxlength"]; ?>"<?php endif; ?>
                required><?php echo escape_html($values[$name] ?? ""); ?></textarea>
        <?php else: ?>
            <input
                id="<?php echo escape_html($name); ?>"
                name="<?php echo escape_html($name); ?>"
                type="<?php echo escape_html($field["type"]); ?>"
                value="<?php echo escape_html($values[$name] ?? ""); ?>"
                <?php if (isset($field["maxlength"])): ?>maxlength="<?php echo (int) $field["maxlength"]; ?>"<?php endif; ?>
                <?php if (isset($field["min"])): ?>min="<?php echo escape_html($field["min"]); ?>"<?php endif; ?>
                <?php if (isset($field["step"])): ?>step="<?php echo escape_html($field["step"]); ?>"<?php endif; ?>
                required>
        <?php endif; ?>
    </p>
<?php endforeach; ?>
