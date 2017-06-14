<?php
namespace OnePica\NoImage\Framework;

use Magento\Framework\Image as ImageFramework;

/**
 * Class for creating placeholder which will prevent throwing an error
 *
 * @package OnePica\NoImage\Framework
 */
class Image extends ImageFramework
{
    /**
     * Initiate placeholder for non-exist images
     *
     * {@inheritdoc}
     */
    public function open()
    {
        if ($this->_fileName && !file_exists($this->_fileName)) {
            $this->initPlaceholder();
        }
        parent::open();
    }

    /**
     * Init placeholder
     *
     * @return $this
     */
    public function initPlaceholder()
    {
        // Create a 20*20 image
        $im = imagecreate(20, 20);

        // White background and blue text
        imagecolorallocate($im, 255, 255, 255);
        // Write the string at the top left
        imagestring($im, 6, 6, 2, 'X', imagecolorallocate($im, 0, 0, 255));

        //init directory
        if (!is_dir(dirname($this->_fileName))) {
            mkdir(dirname($this->_fileName), 0775, true);
        }

        imagepng($im, $this->_fileName);
        imagedestroy($im);

        return $this;
    }
}
