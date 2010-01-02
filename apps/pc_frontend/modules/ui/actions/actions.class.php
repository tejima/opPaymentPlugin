<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * ui actions.
 *
 * @package    OpenPNE
 * @subpackage ui
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class uiActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfWebRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  public function executeSession(sfWebRequest $request)
  {
    $this->logMessage("QUERY_STRING=".$_SERVER['QUERY_STRING'],'debug');
    $session = new PaymentSession();
    $session->member_id = $this->getUser()->getMemberId();
    $session->session = $request->getParameter('custom');
    $session->save();
    $this->redirect('https://www.sandbox.paypal.com/cgi-bin/webscr?'.$_SERVER['QUERY_STRING'],302);
  }
}
