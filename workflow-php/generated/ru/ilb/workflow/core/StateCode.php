<?php

namespace ru\ilb\workflow\core;

class StateCode {

    const open_not_running_not_started = "open.not_running.not_started";
    const open_not_running_suspended = "open.not_running.suspended";
    const open_running = "open.running";
    const closed_completed = "closed.completed";
    const closed_terminated = "closed.terminated";
    const closed_aborted = "closed.aborted";

}
