<?php

declare(strict_types=1);

namespace Rimba\Wfm\Enums;

enum WorkforceEventType: string
{
    case Hired = 'hired';
    case Onboarded = 'onboarded';
    case Assigned = 'assigned';
    case Reassigned = 'reassigned';
    case Transferred = 'transferred';
    case Promoted = 'promoted';
    case Demoted = 'demoted';
    case ReportingChanged = 'reporting_changed';
    case ShiftChanged = 'shift_changed';
    case OrganizationChanged = 'organization_changed';
    case AgreementChanged = 'agreement_changed';
    case ContractRenewed = 'contract_renewed';
    case Suspended = 'suspended';
    case Resumed = 'resumed';
    case Separated = 'separated';
    case Retired = 'retired';
    case Rehired = 'rehired';
    case Corrected = 'corrected';
}
