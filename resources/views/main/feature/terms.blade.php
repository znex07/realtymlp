@extends('main.partials.base')
@section('styles')
    <style>
        body {
            background: #fff;
            margin-top: 100px;
        }
        h1 {
            font-size: 44px !important;
            font-weight: normal !important;
            margin-top: 0px !important;
        }
        .text-uppercase {
            text-transform: uppercase;
        }
        .dl-horizontal dt {
            text-align: left;
            width: 40px;
        }
        .dl-horizontal dd {
            margin-left: 50px;
        }
        dd {
            text-align: left;
        }
    </style>
@endsection
    <div class="container">
        <div class="col-md-3">
            @include('main.feature.sidebar')
        </div>
        <div class="col-md-9">
        <h1>Terms and Conditions</h1>
        <p><strong>These terms and conditions govern your use of our website, www.RealtyMLP.com (herein called “Website”).  Please read these terms and conditions in full before you use this Website.  Using the Website implies that you accept the terms and conditions.  If you disagree with these terms and conditions or any part of these terms and conditions, you must not use our Website.  We may amend these terms and conditions at any time by publishing a new version on this website.</strong></p>
        <p>Last Updated: April 4, 2017</p>
        <dl class="dl-horizontal">
            <dt>1.</dt>
            <dd><p>ACCEPTABLE USE OF OUR WEBSITE</p></dd>
            <dt>1.1</dt>
            <dd>
                <p>
                    The copyright and other intellectual property rights on this Website are owned by SEGOVIA DEVELOPMENT CORP. (“us”, “we”, or “our”) a company duly registered within the laws of the Republic of the Philippines that offer services and information contained on this Website.
                </p>
            </dd>
            <dt>1.2</dt>
            <dd>
                <p>
                    This Website may have certain users (herein called “Members”) that register in the Website to submit user generated content to describe real estate property/ies.
                </p>
            </dd>
            <dt>1.3</dt>
            <dd>
                <p>
                    You are permitted to use our Website for lawful purposes, but you must not download, reproduce, nor exploit the copyright and other intellectual property rights on our Website without our prior consent and the consent of our Members.
                </p>
            </dd>
            <dt>1.4</dt>
            <dd>
                <p>
                    You must not use our Website in any way that causes, or may cause, damage to the website or impairment of the availability or accessibility of the website; or in any way which is directly or indirectly unsolicited, unlawful, illegal, fraudulent or harmful to us, our Members, and the public.
                </p>
            </dd>
            <dt>1.5</dt>
            <dd>
                <p>
                    You must not conduct any systematic or automated data collection activities (including without limitation scraping, data mining, data extraction and data harvesting) on or in relation to our website without our express written consent.
                </p>
            </dd>
            <dt>2.</dt>
            <dd>
                <p>
                    RESTRICTED ACCESS
                </p>
            </dd>
            <dt>2.1</dt>
            <dd>
                <p>
                     Access to certain areas of our Website is restricted.  We reserve the right to restrict access to other areas of our website, or indeed our whole website, at our discretion.
                </p>
            </dd>
            <dt>2.2</dt>
            <dd>
                <p>
                    If we provide you with a user ID and password to enable you to access restricted areas of our Website or other content or services, you must ensure that that user ID and password is kept confidential. We cannot be held responsible for the loss of your password nor the use of it by someone else.
                </p>
            </dd>
            <dt>3.</dt>
            <dd>
                <p>
                    USER GENERATED CONTENT
                </p>
            </dd>
            <dt>3.1</dt>
            <dd>
                <p>
                    User generated content (including without limitation text and images) that you submit to our website for the purpose of publishing and sharing, should be submitted in accordance with the acceptable Use of Website (see Section 1).
                </p>
            </dd>
            <dt>3.2</dt>
            <dd>
                <p>
                    With the exception of personally identifiable information, any user generated content you send or post to this Website shall be considered proprietary to yourself as our Member.  It is within your rights to publish such and remove such at your discretion.  However, if such user generated content does not comply with the Acceptable Use of Our Website, we may remove such user generated content without prior notice to the member.
                </p>
            </dd>
            <dt>4</dt>
            <dd>
                <p>
                    LIMITED WARRANTIES
                </p>
            </dd>
            <dt>4.1</dt>
            <dd>
                <p>
                    We take all reasonable steps to ensure that the information on this Website is correct.  However, we do not warrant nor guarantee the correctness, completeness, and accuracy of material on this website.
                </p>
            </dd>
            <dt>4.2</dt>
            <dd>
                <p>
                    We take all reasonable steps to ensure that this Website is available 24 hours every day, 365 days per year. However, websites do sometimes encounter downtime due to server and, other technical issues.  Therefore we will not be liable if this website is unavailable at any time.
                </p>
            </dd>
            <dt>5</dt>
            <dd>
                <p>
                    LIMITATIONS AND EXCLUSIONS OF LIABILITY
                </p>
            </dd>
            <dt>5.1</dt>
            <dd>
                <p>
                    We will not be liable for any loss or damage of any nature including, but not limited to:
                </p>
            </dd>
            <dt></dt>
            <dd>
                <dl class="dl-horizontal">
                    <dt>(a)</dt>
                    <dd><p> losses arising out of any event or events beyond our reasonable control;</p></dd>
                    <dt>(b)</dt>
                    <dd><p> losses in business including, but not limited to, loss of or damage to profits, income, revenue, use, production, anticipated savings, business, contracts, commercial opportunities or goodwill;
                        </p></dd>
                    <dt>(c)</dt>
                    <dd><p>loss or corruption of any data, database or software;</p></dd>
                    <dt>(d)</dt>
                    <dd><p> and any special, indirect or consequential loss or damage.</p></dd>
                </dl>
            </dd>
            <dt>6.</dt>
            <dd>
                <p>
                    INDEMNITY
                </p>
            </dd>
            <dt>6.1</dt>
            <dd>
                <p>
                    You hereby indemnify us and undertake to keep us indemnified against any losses, damages, costs, liabilities and expenses (including without limitation legal expenses and any amounts paid by us to a third party in settlement of a claim or dispute on the advice of our legal advisers) incurred or suffered by us arising out of any breach by you of any provision of these terms and conditions, or arising out of any claim that you have breached any provision of these terms and conditions
                </p>
            </dd>
            <dt>7.</dt>
            <dd>
                <p>
                    BREACHES OF THESE TERMS AND CONDITIONS
                </p>
            </dd>
            <dt>7.1</dt>
            <dd>
                <p>
                    Without prejudice to our other rights under these terms and conditions, if you breach these terms and conditions in any way, we may take such action as we deem appropriate to deal with the breach, including suspending your access to the website, prohibiting you from accessing the website, blocking computers using your IP address from accessing the website, contacting your internet service provider to request that they block your access to the website and/or bringing court proceedings against you.
                </p>
            </dd>
            <dt>8.</dt>
            <dd>
                <p>
                    ASSIGNMENT
                </p>
            </dd>
            <dt>8.1</dt>
            <dd>
                <p>
                    We may transfer, sub-contract or otherwise deal with our rights and/or obligations under these terms and conditions without notifying you or obtaining your consent.
                </p>
            </dd>
            <dt>8.2</dt>
            <dd>
                <p>
                    You may not transfer, sub-contract or otherwise deal with your rights and/or obligations under these terms and conditions.
                </p>
            </dd>
            <dt>9.</dt>
            <dd>
                <p>
                    SEVERABILITY
                </p>
            </dd>
            <dt>9.1</dt>
            <dd>
                <p>
                    If a provision of these terms and conditions is determined by any court or other competent authority to be unlawful and/or unenforceable, the other provisions will continue in effect.  If any unlawful and/or unenforceable provision would be lawful or enforceable if part of it were deleted, that part will be deemed to be deleted, and the rest of the provision will continue in effect.
                </p>
            </dd>
            <dt>10.</dt>
            <dd>
                <p>
                    EXCLUSION OF THIRD PARTY RIGHTS
                </p>
            </dd>
            <dt>10.1</dt>
            <dd>
                <p>
                    These terms and conditions are for the benefit of you and us, and are not intended to benefit any third party or be enforceable by any third party.  The exercise of our and your rights in relation to these terms and conditions is not subject to the consent of any third party.
                </p>
            </dd>
            <dt>11.</dt>
            <dd>
                <p>
                    ENTIRE AGREEMENT
                </p>
            </dd>
            <dt>11.1</dt>
            <dd>
                <p>
                    This disclaimer, together with our privacy policy, constitutes the entire agreement between you and us in relation to your use of our website, and supersedes all previous agreements in respect of your use of this website.
                </p>
            </dd>
            <dt>11.2</dt>
            <dd>
                <p>
                    This disclaimer shall be governed by and construed in accordance with the laws of the Republic of the Philippines.  Any dispute(s) arising in connection with this Legal Notice are subject to the exclusive jurisdiction of the Republic of the Philippines.
                </p>
            </dd>
        </dl>
        </div>
   </div>