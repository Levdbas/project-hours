<div class="progress-bar position <?php echo $current_color;?>" data-percent="  <?php echo widget_output($workFields, $used_hours, $bought_hours, 'percentage'); ?>">
  <div class="background">
    <div class="rotate"></div>
  </div>
  <div class="left"></div>
  <div class="right"></div>
  <div class="innerCicle">
    <span class="textHolder">
      <span class="text <?php echo font_size($used_hours); ?>">
        <?php echo widget_output($workFields, $used_hours, $bought_hours, 'time'); ?>
        <br class="smallbr" />
        <?php
        //echo "<br class='bigbr' />";
        _e( 'hours', $this->plugin_name);
        echo "<br class='bigbr' />";
        _e( 'used', $this->plugin_name);
        ?>
      </span>
    </span>
  </div>
</div>
