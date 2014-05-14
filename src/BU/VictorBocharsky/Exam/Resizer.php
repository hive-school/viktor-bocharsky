<?php

namespace BU\VictorBocharsky\Exam;

use BU\VictorBocharsky\Exam\AbstractResizer;
use BU\VictorBocharsky\Exam\ImageInterface;
use BU\VictorBocharsky\Exam\Image;

class Resizer extends AbstractResizer
{

    /**
     * @var Image The resizing image
     */
    private $image;

    private $finalWidth = 50;

    private $finalHeight = 50;

    private $centerPointX = 0;

    private $centerPointY = 0;

    private $leftTopX = 0;

    private $leftTopY = 0;

    private $rightBottomX = 0;

    private $rightBottomY = 0;


    public function __construct(Image $image, $finalWidth = 0, $finalHeight = 0)
    {
        $this->image = $image;
        $this
            ->setFinalWidth($finalWidth)
            ->setFinalHeight($finalHeight)
        ;
    }


    /**
     * As a result square centralized  picture should be returned
     * @return mixed
     */
    public function thumbnail()
    {
        $this->centerPointX = round($this->image->getWidth() / 2);
        $this->centerPointY = round($this->image->getHeight() / 2);

        return 'Final image size: ' . $this->finalWidth . ' x ' . $this->finalHeight . '. ' . PHP_EOL
            . 'Center of image in ' . $this->centerPointX . ' x ' . $this->centerPointY . '. ' . PHP_EOL;
        ;
    }

    /**
     * @return int
     */
    public function getFinalWidth()
    {
        return $this->finalWidth;
    }

    /**
     * @param int $finalWidth
     */
    public function setFinalWidth($finalWidth)
    {
        $this->finalWidth = (int)$finalWidth;
        return $this;
    }

    /**
     * @return int
     */
    public function getFinalHeight()
    {
        return $this->finalHeight;
    }

    /**
     * @param int $finalHeight
     */
    public function setFinalHeight($finalHeight)
    {
        $this->finalHeight = (int)$finalHeight;
        return $this;
    }

}