<?php

namespace Kadeke\DigipassBundle\Helper;

/**
 * Interface for a user which can authenticate using MyDigipass.com
 */
interface DigipassUser {

    /**
     * @param string $digipass_uuid
     */
    public function setDigipassUuid($digipass_uuid);

    /**
     * @return string
     */
    public function getDigipassUuid();

}