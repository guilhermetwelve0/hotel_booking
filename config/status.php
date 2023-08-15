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
        0 => "#fef08a",
        1 => "#bfdbfe",
        2 => "#ddd6fe",
        3 => "#bbf7d0",
    ],
    "status_border_color" => [
        0 => "#facc15",
        1 => "#60a5fa",
        2 => "#a78bfa",
        3 => "#4ade80",
    ],
    "status_icon" => [
        0 => "spinner",
        1 => "bookmark",
        2 => "calendar-check",
        3 => "circle-check",
    ],
];
