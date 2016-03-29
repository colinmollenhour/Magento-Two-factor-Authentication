<?php

class MageHackDay_TwoFactorAuth_Helper_Data extends Mage_Core_Helper_Data
{

    /**
     * @return bool
     */
    public function isActive()
    {
        return Mage::getStoreConfigFlag('admin/security/active');
    }

    /**
     * @return bool
     */
    public function isForceForBackend()
    {
        return Mage::getStoreConfigFlag('admin/security/force_for_backend');
    }

    /**
     * @return bool
     */
    public function isFrontendActive()
    {
        return Mage::getStoreConfigFlag('admin/security/frontend_active');
    }

    /**
     * @return int
     */
    public function getRememberMeDuration()
    {
        $duration = Mage::getStoreConfig('admin/security/remember_me_duration');
        if ($duration === "0") {
            return 0;
        }
        return max(600, (int) $duration);
    }
}
