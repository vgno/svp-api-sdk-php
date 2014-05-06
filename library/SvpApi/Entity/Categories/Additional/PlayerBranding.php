<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApi\Entity\Categories\Additional;
use SvpApi\Entity\EntityAbstract;


/**
 * SvpApi Additional Categories Player Branding Entity
 */
class PlayerBranding extends EntityAbstract {
    /**
     * Player branding id
     *
     * @var integer
     */
    protected $id;
    /**
     * Player branding background image url
     *
     * @var string
     */
    protected $playerBackground;
    /**
     * Player background url
     *
     * @var string
     */
    protected $link;

    public function getArrayCopy() {
        return ['id' => $this->id];
    }
}
