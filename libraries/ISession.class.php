<?php

interface ISession {
    public function setSessionValue($data);
    public function getSessionValue();
    public function extendTtl();
}