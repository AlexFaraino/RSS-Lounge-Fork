<?PHP 

/**
 * Plugin for fetching the images from vi.sulaize.us
 *
 * @package    plugins
 * @subpackage images
 * @copyright  Copyright (c) Tobias Zeising (http://www.aditu.de)
 * @license    GPLv3 (http://www.gnu.org/licenses/gpl-3.0.html)
 */
class plugins_images_visualizeus extends plugins_rss_multimedia {

    /**
     * url of the icon or false if no icon available
     *
     * @var string
     */
    public $icon = 'plugins/images/visualizeus.gif';

        
    /**
     * category of this source type
     *
     * @var string
     */
    public $category = 'Images';
    
    
    /**
     * set name of source (inputfield for user of this source)
     * false means that no source is necessary
     *
     * @var bool|string
     */
    public $source = 'Tag (optional)';
    
    
    /**
     * source optional
     *
     * @var bool|string
     */    public $sourceOptional = true;
    
    
    /**
     * description of this source type
     *
     * @var string
     */
    public $description = 'This feed fetches the popular gallery of vi.sualize.us';
    
    
    /**
     * returns the url for the opml export
     *
     * @return string the full feed url
     * @param string $url the url source (username, etc.)
     */
    public function opml($url) {
        return 'http://vi.sualize.us/rss/popular/'.urlencode($url);
    }
    
    
    /**
     * loads content for given source
     *
     * @return void
     * @param string $url the source of the current feed
     */
    public function load($tag) {
        parent::load($this->opml($tag));
    }


    /**
     * returns an unique id for this item
     * use link in this case
     *
     * @return string id as hash
     */
    public function getId() {
        return $this->getLink();
    }    
    
}
