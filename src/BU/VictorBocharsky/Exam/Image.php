<?php
/**
 * Created by PhpStorm.
 * User: bionic
 * Date: 5/14/14
 * Time: 11:21 AM
 */

namespace BU\VictorBocharsky\Exam;


class Image implements ImageInterface {

    /**
     * @var int The width of image in px
     */
    private $width = 0;

    /**
     * @var int The height of image in px
     */
    private $height = 0;


    public function __construct($width, $height)
    {
        $this
            ->setWidth($width)
            ->setHeight($height)
        ;
    }


    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = (int)$width;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = (int)$height;
        return $this;
    }

} 