<?php

namespace ebussola\common\datatype;

/**
 * User: Leonardo Shinagawa
 * Date: 15/08/12
 * Time: 20:05
 *
 * @property $full_address string
 */
class Url
{

    /**
     * @var string
     * The full address
     */
    protected $full_address;

    /**
     * @var string
     * The protocol used on the address
     * http, https, ftp...
     */
    public $scheme;

    /**
     * @var string
     * eg.: www.ebussola.com
     */
    public $host;

    /**
     * @var string
     */
    public $port;

    /**
     * @var string
     */
    public $user;

    /**
     * @var string
     */
    public $pass;

    /**
     * @var string
     */
    public $path;

    /**
     * @var string
     * Fragment is the part after a # used on single-page applications or to make an anchor
     */
    public $fragment;

    /**
     * @var array
     * The query string separated by key=>value in array format
     */
    public $query;

    /**
     * @var string
     * The query string in string format
     */
    public $query_string;

    /**
     * @param String $address
     */
    public function __construct($address = null)
    {
        if ($address !== null) {
            $this->setAddress($address);
        }
    }

    /**
     * @param String $address
     */
    public function setAddress($address)
    {
        $full_address = filter_var($address, FILTER_SANITIZE_URL);
        $info = parse_url($full_address);

        $this->full_address = $full_address;

        $this->scheme = isset($info['scheme']) ? $info['scheme'] : null;
        $this->host = isset($info['host']) ? $info['host'] : null;
        $this->port = isset($info['port']) ? $info['port'] : null;
        $this->user = isset($info['user']) ? $info['user'] : null;
        $this->pass = isset($info['pass']) ? $info['pass'] : null;
        $this->path = isset($info['path']) ? $info['path'] : null;
        $queries = array();
        if (isset($info['query'])) {
            parse_str($info['query'], $queries);
            $this->query = $queries;
            $this->query_string = http_build_query($this->query);
        }
        $this->fragment = isset($info['fragment']) ? $info['fragment'] : null;
    }

    public function __get($name)
    {
        if ($name === 'full_address') {
            $this->assembleUrl();

            return $this->full_address;
        }

        return null;
    }

    /**
     * Assemble the fullAddress from the other properties
     */
    private function assembleUrl()
    {
        $address = '';
        if (!empty($this->scheme)) {
            $address .= $this->scheme . '://';
        }
        if (!empty($this->user)) {
            $address .= $this->user;
        }
        if (!empty($this->pass)) {
            $address .= ':' . $this->pass . '@';
        }
        if (!empty($this->host)) {
            $address .= $this->host;
        }
        if (!empty($this->port)) {
            $address .= ':' . $this->port;
        }
        if (!empty($this->path)) {
            $address .= $this->path;
        }
        if (count($this->query) > 0) {
            $this->query_string = http_build_query($this->query);
            $address .= '?' . $this->query_string;
        }
        if (!empty($this->fragment)) {
            $address .= '#' . $this->fragment;
        }

        $this->full_address = $address;
    }

}
