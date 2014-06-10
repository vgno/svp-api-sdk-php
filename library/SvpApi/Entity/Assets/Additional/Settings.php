<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApi\Entity\Assets\Additional;
use SvpApi\Entity\EntityAbstract;


/**
 * SvpApi Additional Settings Entity
 */
class Settings extends EntityAbstract {
    /**
     * Whether or not to show ads
     *
     * @var boolean
     */
    protected $showAds;
    /**
     * Whether or not to show embed code
     *
     * @var boolean
     */
    protected $showEmbed;
    /**
     * Whether or not to show comments
     *
     * @var boolean
     */
    protected $showComments;
    /**
     * Flag indicating whether content was registered in TONO,
     *
     * @var boolean
     */
    protected $tonoRegistered;
    /**
     * The user who created the asset
     *
     * @var string
     */
    protected $createdBy;
    /**
     * The user who modified an asset as the last one
     *
     * @var string
     */
    protected $lastEditedBy;
    /**
     * The source of an asset
     *
     * @var integer
     */
    protected $source;
    /**
     * notes - internal stuff
     *
     * @var string
     */
    protected $notes;
}
