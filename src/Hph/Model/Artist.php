<?php
/**
 * Created by PhpStorm.
 * User: wilder1
 * Date: 05/04/17
 * Time: 11:43
 */

namespace Hph\Model;


class Artist
{

    private $id;
    private $name;
    private $bio;
    private $image_path;
    private $video_url;
    private $facebook_url;
    private $youtube_url;
    private $twitter_url;
    private $spotify_url;
    private $status;
    private $tags;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * @return mixed
     */
    public function getImagePath()
    {
        return $this->image_path;
    }

    /**
     * @param mixed $image_path
     */
    public function setImagePath($image_path)
    {
        $this->image_path = $image_path;
    }

    /**
     * @return mixed
     */
    public function getVideoUrl()
    {
        return $this->video_url;
    }

    /**
     * @param mixed $video_url
     */
    public function setVideoUrl($video_url)
    {
        $this->video_url = $video_url;
    }

    /**
     * @return mixed
     */
    public function getFacebookUrl()
    {
        return $this->facebook_url;
    }

    /**
     * @param mixed $facebook_url
     */
    public function setFacebookUrl($facebook_url)
    {
        $this->facebook_url = $facebook_url;
    }

    /**
     * @return mixed
     */
    public function getYoutubeUrl()
    {
        return $this->youtube_url;
    }

    /**
     * @param mixed $youtube_url
     */
    public function setYoutubeUrl($youtube_url)
    {
        $this->youtube_url = $youtube_url;
    }

    /**
     * @return mixed
     */
    public function getTwitterUrl()
    {
        return $this->twitter_url;
    }

    /**
     * @param mixed $twitter_url
     */
    public function setTwitterUrl($twitter_url)
    {
        $this->twitter_url = $twitter_url;
    }

    /**
     * @return mixed
     */
    public function getSpotifyUrl()
    {
        return $this->spotify_url;
    }

    /**
     * @param mixed $spotify_url
     */
    public function setSpotifyUrl($spotify_url)
    {
        $this->spotify_url = $spotify_url;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }



}