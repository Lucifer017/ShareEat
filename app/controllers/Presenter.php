<?php

class Presenter{

    /**
     * Convert Array to JSON
     * @param $request
     * @return JSON
     */
    public function json($request){
        return json_encode($request);
    }
}
