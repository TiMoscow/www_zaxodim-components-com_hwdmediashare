<?php
/**
 * @package     Joomla.site
 * @subpackage  Component.hwdmediashare
 *
 * @copyright   Copyright (C) 2013 Highwood Design Limited. All rights reserved.
 * @license     GNU General Public License http://www.gnu.org/copyleft/gpl.html
 * @author      Dave Horsfall
 */

defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR . '/helpers/html');
JHtml::_('HwdPopup.iframe', 'page');

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.calendar');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', '.hwd-form-catid', null, array('placeholder_text_multiple' => JText::_('COM_HWDMS_UPLOADS_SELECT_CATEGORY')));
JHtml::_('formbehavior.chosen', '.hwd-form-tags', null, array('placeholder_text_multiple' => JText::_('COM_HWDMS_UPLOADS_SELECT_TAGS')));
JHtml::_('formbehavior.chosen', 'select');
?>
<div class="edit">
<form action="<?php echo JRoute::_('index.php?option=com_hwdmediashare'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">
  <div id="hwd-container" class="<?php echo $this->pageclass_sfx;?>"> <!-- a name="top" id="top"></a --> <a id="top"></a>
    <!-- Media Navigation -->
    <?php echo hwdMediaShareHelperNavigation::getInternalNavigation(); ?>
    <!-- Media Header -->
    <div class="media-header">
      <h2 class="media-upload-title"><?php echo JText::_('COM_HWDMS_ADD_REMOTE_MEDIA'); ?></h2>
    </div>
    <fieldset>
      <div class="row-fluid">
        <div class="span8">               
          <div class="control-group">
            <div class="control-label hide">
              <?php echo $this->form->getLabel('remote'); ?>
            </div>
            <div class="controls">
              <?php echo $this->form->getInput('remote'); ?>
            </div>
          </div>
          <?php if ($this->params->get('enable_categories')): ?>
          <div class="control-group">
            <div class="control-label hide">
              <?php echo $this->form->getLabel('catid'); ?>
            </div>              
            <div class="controls">
              <?php echo $this->form->getInput('catid'); ?>
            </div>
          </div>                          
          <?php endif; ?>            
          <?php if ($this->params->get('enable_tags')): ?>
          <div class="control-group">
            <div class="control-label hide">
              <?php echo $this->form->getLabel('tags'); ?>
            </div>              
            <div class="controls">
              <?php echo $this->form->getInput('tags'); ?>
            </div>
          </div>    
          <?php endif; ?>  
        </div>
        <div class="span4">
          <div class="control-group">
            <div class="control-label hide">
              <?php echo $this->form->getLabel('private'); ?>
            </div>                 
            <div class="controls">
              <?php echo $this->form->getInput('private'); ?>
            </div>
          </div> 
          <div class="btn-toolbar row-fluid">
            <button type="submit" class="btn btn-primary validate btn-large span12">
              <?php echo JText::_('COM_HWDMS_ADD') ?>
            </button>
          </div>  
          <?php if ($this->params->get('enable_uploads_file')): ?>
          <div class="btn-toolbar row-fluid">
            <a title="<?php echo JText::_('COM_HWDMS_ADD_MEDIA'); ?>" href="<?php echo JRoute::_(hwdMediaShareHelperRoute::getUploadRoute(array('method' => 'local'))); ?>" class="btn span12"><?php echo JText::_('COM_HWDMS_BUTTON_OR_SELECT_FILES_TO_UPLOAD'); ?></a>
          </div> 
          <?php endif; ?>    
        </div>
      </div>  
    </fieldset>     
    <div class="clearfix"></div>
    <div class="well well-small">
      <h3><?php echo JText::_('COM_HWDMS_HELP_AND_SUGGESTIONS'); ?></h3>
      <?php if ($this->params->get('upload_terms_id')): ?>
        <p><?php echo JText::sprintf('COM_HWDMS_ACKNOWLEDGE_TERMS_AND_CONDITIONS', '<a href="' . JRoute::_('index.php?option=com_content&view=article&id=' . $this->params->get('upload_terms_id') . '&tmpl=component') . '" class="media-popup-iframe-page">' . JText::_('COM_HWDMS_TERMS_AND_CONDITIONS_LINK') . '</a>'); ?></p>      
      <?php endif; ?>
      <p><?php echo JText::sprintf('COM_HWDMS_SUPPORTED_REMOTE_SITES_LIST_X', hwdMediaShareRemote::getReadableAllowedRemotes()); ?></p>
    </div>      
    <?php // These need to be set when submitted, but they are also validated later. ?>    
    <input type="hidden" name="jform[published]" value="1" />
    <input type="hidden" name="jform[status]" value="1" />
    <input type="hidden" name="jform[featured]" value="0" />
    <input type="hidden" name="jform[access]" value="1" />  
    <input type="hidden" name="task" value="addmedia.remote" />
    <?php echo $this->form->getInput('album_id'); ?>
    <?php echo $this->form->getInput('category_id'); ?>
    <?php echo $this->form->getInput('group_id'); ?>
    <?php echo $this->form->getInput('playlist_id'); ?>
    <?php echo JHtml::_('form.token'); ?>
  </div>
</form>
</div>
