<?php

class MageHackDay_TwoFactorAuth_Block_Adminhtml_Interstitial extends Mage_Adminhtml_Block_Template
{
    /**
     * Check whether the user has secret question
     *
     * @return bool
     */
    public function hasSecretQuestion()
    {
        return Mage::getResourceModel('twofactorauth/user_question')->hasQuestions($this->getUser());
    }

    /**
     * @return Mage_Admin_Model_User
     */
    public function getUser()
    {
        return Mage::getSingleton('admin/session')->getUser();
    }

    /**
     * @return string
     */
    public function getRememberMePeriod()
    {
        $seconds = Mage::helper('twofactorauth')->getRememberMeDuration();
        if ($seconds === 0) {
            return $this->__('until the browser is closed');
        }
        if ($seconds >= 86400*2) {
            return $this->__('for %d days', $seconds / 86400);
        } else if ($seconds >= 3600*2) {
            return $this->__('for %d hours', $seconds / 3600);
        } else {
            return $this->__('for %d minutes', $seconds / 60);
        }
    }

}
