<?php
/**
 * Created by: tiago
 * Email: tiago.iwamoto@gmail.com
 * Linkedin: https://www.linkedin.com/in/tiago-iwamoto/
 * Created at: 15/05/2021 - 13:14
 */

namespace app\entity;


class IwtFile{

    private $id;
    private $title;
    private $description;
    private $image_url;
    private $thumb_url;
    private $file_size;
    private $img_width;
    private $img_height;
    private $img_format;
    private $created_at;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return IwtFile
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return IwtFile
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return IwtFile
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * @param mixed $image_url
     * @return IwtFile
     */
    public function setImageUrl($image_url)
    {
        $this->image_url = $image_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getThumbUrl()
    {
        return $this->thumb_url;
    }

    /**
     * @param mixed $thumb_url
     * @return IwtFile
     */
    public function setThumbUrl($thumb_url)
    {
        $this->thumb_url = $thumb_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFileSize()
    {
        return $this->file_size;
    }

    /**
     * @param mixed $file_size
     * @return IwtFile
     */
    public function setFileSize($file_size)
    {
        $this->file_size = $file_size;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImgWidth()
    {
        return $this->img_width;
    }

    /**
     * @param mixed $img_width
     * @return IwtFile
     */
    public function setImgWidth($img_width)
    {
        $this->img_width = $img_width;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImgHeight()
    {
        return $this->img_height;
    }

    /**
     * @param mixed $img_height
     * @return IwtFile
     */
    public function setImgHeight($img_height)
    {
        $this->img_height = $img_height;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImgFormat()
    {
        return $this->img_format;
    }

    /**
     * @param mixed $img_format
     * @return IwtFile
     */
    public function setImgFormat($img_format)
    {
        $this->img_format = $img_format;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     * @return IwtFile
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

}
