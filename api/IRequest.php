<?php

interface IRequest {
    public function getBody();
    public function getParams();
    public function getMethod();
    public function getPath();
    public function getQuery();
}
?>