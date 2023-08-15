<?php

return [
   "status_id" => [
        "pending" => 0,
        "booked" => 1,
        "checkedIn" => 2,
        "completed" => 3,
   ],
   "status_label" => [
        0 => "Pending",
        1 => "Booked",
        2 => "Checked In",
        3 => "Completed",
   ],
   "status_bg_color" => [
        0 => "bg-yellow-200",
        1 => "bg-blue-200",
        2 => "bg-purple-200",
        3 => "bg-green-200",
    ],
    "status_border_color" => [
        0 => "border-yellow-400",
        1 => "border-blue-400",
        2 => "border-purple-400",
        3 => "border-green-400",
    ],
    "status_icon" => [
        0 => "spinner",
        1 => "bookmark",
        2 => "calendar-check",
        3 => "circle-check",
    ]
];
