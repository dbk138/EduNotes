<ul class="actions">
<?php 
if(UserModule::isAdmin()) {
?>
<li><?php echo CHtml::link(UserModule::t('Manage User'),array('/user/admin')); ?></li>
<li><?php echo CHtml::link(UserModule::t('List User'),array('/user')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Manage Profile Fields'), array('/user/profileField/admin')); ?></li>
<?php 
}
?>
<li><?php echo CHtml::link(UserModule::t('Edit Profile'),array('edit')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Change password'),array('changepassword')); ?></li>
</ul>