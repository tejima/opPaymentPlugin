<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * paypal actions.
 *
 * @package    OpenPNE
 * @subpackage paypal
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class paypalActions extends sfActions
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
  public function executeIpn(sfWebRequest $request)
  {
    $p = new paypal_class;
    $p->ipn_log = false;
    $p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; 
    if ($p->validate_ipn()) {
      $this->logMessage('validate_ipn success','debug');
      $this->logMessage('CUSTOM:' . $request->getParameter('custom'),'debug');

      $session = Doctrine::getTable('PaymentSession')->findOneBySession($request->getParameter('custom'));
      if($session){
        $member = $session->getMember();
        $point = $member->getConfig('PAYMENT_POINT') + $request->getParameter('mc_gross');
        $member->setConfig('PAYMENT_POINT',$point);
        $member->save();
        $session->status = 'completed';
        $session->save();
      }else{
        $this->logMessage('PaymenSessionミスマッチ。sessionが見つからない','debug');
      }      
    }else{
      $this->logMessage('validate_ipn fail','debug');
    }
    $post_params = $request->getPostParameters();
    $post_log = print_r($post_params,true);
    $this->logMessage("post::".$post_log,'debug');

    $get_params = $request->getGetParameters();
    $get_log = print_r($get_params,true);
    $this->logMessage("get::".$get_log,'debug');

    //print_r($request);
    $this->logMessage('debug log', 'debug');
    //return sfView::SUCCESS;
  }
}
