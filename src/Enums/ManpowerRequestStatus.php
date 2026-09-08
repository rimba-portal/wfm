<?php

namespace Rimba\Wfm\Enums;
enum ManpowerRequestStatus: string
{
    case Draft = "draft";
    case Approved = "approved";
    case Rejected = "rejected";
}

