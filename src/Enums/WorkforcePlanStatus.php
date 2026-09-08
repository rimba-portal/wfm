<?php

namespace Rimba\Wfm\Enums;
enum WorkforcePlanStatus: string
{
    case Draft = "draft";
    case Submitted = "submitted";
    case Approved = "approved";
    case Rejected = "rejected";
}

