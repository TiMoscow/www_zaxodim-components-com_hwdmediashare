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

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
?>
<form action="<?php echo htmlspecialchars(JFactory::getURI()->toString()); ?>" method="post" name="adminForm" id="adminForm">
  <div id="hwd-container" class="<?php echo $this->pageclass_sfx;?>"> <!-- a name="top" id="top"></a --> <a id="top"></a>
    <!-- Media Navigation -->
    <?php echo hwdMediaShareHelperNavigation::getInternalNavigation(); ?>    
    <!-- Media Header -->
    <div class="media-header">
      <h2 class="media-search-title"><?php echo $this->escape($this->params->get('page_heading')); ?></h2>
      <!-- Buttons -->
      <div class="btn-group pull-right">
        <button name="<?php echo JText::_('COM_HWDMS_BUTTON_ADVANCED_SEARCH'); ?>" onclick="Joomla.submitbutton('search.advanced')" class="btn<?php echo $this->mode == 'advanced' ? ' active' : ''; ?>" title="<?php echo JHtml::tooltipText('COM_HWDMS_BUTTON_ADVANCED_SEARCH');?>"><span class="icon-search"></span> <?php echo JText::_('COM_HWDMS_BUTTON_ADVANCED_SEARCH'); ?></button>
        <button name="<?php echo JText::_('COM_HWDMS_BUTTON_CLEAR_SEARCH'); ?>" onclick="Joomla.submitbutton('search.clear')" class="btn" title="<?php echo JHtml::tooltipText('COM_HWDMS_BUTTON_CLEAR_SEARCH');?>"><span class="icon-delete"></span> <?php echo JText::_('COM_HWDMS_BUTTON_CLEAR_SEARCH'); ?></button>
      </div>        
      <div class="clear"></div>
      <!-- Navigation -->
      <div class="media-tabmenu">
        <ul>
          <li class="<?php echo ($this->type == 'media' ? 'active ' : false); ?>media-tabmenu-media"><a href="<?php echo JRoute::_('index.php?option=com_hwdmediashare&view=search&type=media'); ?>">Media</a></li>
          <li class="<?php echo ($this->type == 'albums' ? 'active ' : false); ?>media-tabmenu-albums"><a href="<?php echo JRoute::_('index.php?option=com_hwdmediashare&view=search&type=albums'); ?>">Albums</a></li>
          <li class="<?php echo ($this->type == 'playlists' ? 'active ' : false); ?>media-tabmenu-albums"><a href="<?php echo JRoute::_('index.php?option=com_hwdmediashare&view=search&type=playlists'); ?>">Playlists</a></li>
          <li class="<?php echo ($this->type == 'groups' ? 'active ' : false); ?>media-tabmenu-albums"><a href="<?php echo JRoute::_('index.php?option=com_hwdmediashare&view=search&type=groups'); ?>">Groups</a></li>
          <li class="<?php echo ($this->type == 'channels' ? 'active ' : false); ?>media-tabmenu-albums"><a href="<?php echo JRoute::_('index.php?option=com_hwdmediashare&view=search&type=channels'); ?>">Channels</a></li>
        </ul>
      </div>      
      <div class="clear"></div>
    </div>
    <!-- Search Form -->
    <?php echo $this->loadTemplate('form'); ?>
    <!-- Search Results -->
    <?php if ($this->status) : ?>
    <div class="media-<?php echo $this->display; ?>-view">
      <?php if (empty($this->items)) : ?>
        <div class="alert alert-no-items">
          <?php echo JText::_('COM_HWDMS_NO_SEARCH_RESULTS'); ?>
        </div>
      <?php else : ?>
        <p><?php echo JText::sprintf('COM_HWDMS_SEARCH_MATCHED_N_RESULTS_IN_N_SECONDS', $this->total, $this->time); ?></p>
        <?php echo JLayoutHelper::render($this->type . '_' . $this->display, $this, JPATH_ROOT.'/components/com_hwdmediashare/libraries/layouts'); ?>
      <?php endif; ?>        
    </div>    
    <!-- Pagination -->
    <div class="pagination"> <?php echo $this->pagination->getPagesLinks(); ?> </div>
    <?php endif; ?>    
  </div>
  <input type="hidden" name="task" value="" />  
  <input type="hidden" name="return" value="<?php echo $this->return;?>" />
  <?php echo JHtml::_( 'form.token' ); ?>   
</form>