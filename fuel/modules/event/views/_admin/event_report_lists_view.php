<?php echo css($this->config->item('event_css'), 'event')?> 
<div class="main_width">

            <div class="main_body">

                <div class="right_side1">

                    <div class="sys_right_name"><?php echo $event->title ?></div>

                    <div class="sys_right_name">投票結果</div>

                    <div class="main_720">

                        <div class="sys_result_num">參與人數：<?php echo  $count; ?></div>

                        <?php if (isset($results)): ?>
                        	<?php foreach ($results as $key => $value): ?>
                        		<div class="sys_result_block">

		                            <div class="result_name"><?php echo $value->item_name; ?></div>

		                            <?php

		                            // unset($bar);
		                            $bar = '';

                                    $i_total = ( $value->count / $count) * 100;

		                            for ($i = 0; $i < $i_total ; $i++) {

		                                $bar.="<div class='result_bar'></div>";

		                            }

		                            echo $bar;

		                            ?>

		                            <div class="single_result"><?php echo  $value->count; ?></div>

		                        </div>
                        	<?php endforeach ?>
                        <?php endif ?> 

                    </div>



                </div>

            </div>

        </div>