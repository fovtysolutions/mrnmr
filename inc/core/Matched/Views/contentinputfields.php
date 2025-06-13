<style>
    /* body {
                font-family: "Inter", -apple-system, BlinkMacSystemFont, sans-serif;
                margin: 0;
                padding: 40px;
                background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
                color: #2d3748;
            } */

    .matched-profile-cmp {
        margin: 0 auto;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow-y: auto;
        overflow: auto;
        scrollbar-width: none;
        /* Firefox */
        -ms-overflow-style: none;
        /* IE 10+ */
        height: 95vh;
    }

    .matched-profile-cmp table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .matched-profile-cmp th,
    .matched-profile-cmp td {
        padding: 20px;
        text-align: center;
        border-bottom: 1px solid #edf2f7;
    }

    .matched-profile-cmp th {
        font-weight: 600;
        color: #2d3748;
        font-size: 0.9rem;
        letter-spacing: 0.05em;
    }

    .matched-profile-cmp td {
        vertical-align: middle;
        color: #4a5568;
    }

    .matched-profile-cmp tr:hover {
        background-color: #f7fafc;
        transition: background-color 0.3s ease;
    }

    .matched-profile-cmp .profile-header {
        font-size: 16px;
        color: #1a202c;
        background-color: #e2e8f0;
        font-weight: 700;
    }

    .matched-profile-cmp .list {
        list-style-type: disc;
        padding-left: 20px;
        display: inline-block;
        text-align: left;
    }

    .matched-profile-cmp .contact-info {
        color: #3182ce;
        font-weight: 500;
    }

    .matched-profile-cmp .profile-pic {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 12px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        border: 3px solid #e2e8f0;
        transition: transform 0.3s ease;
    }

    .matched-profile-cmp .profile-pic:hover {
        transform: scale(1.05);
    }

    .matched-profile-cmp h4 {
        text-align: center;
        margin: 0;
        font-size: 1.25rem;
        color: #2d3748;
        font-weight: 600;
    }

    .matched-profile-cmp .select-container {
        display: flex;
        justify-content: center;
    }

    .matched-profile-cmp .head-row-bg {
        background-color: #e2e8f0;
    }

    .matched-profile-cmp .head-row-bg:hover {
        background-color: #e2e8f0;
    }

    .matched-profile-cmp .profile-select {
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        background-color: #ffffff;
        color: #2d3748;
        font-size: 0.95rem;
        width: 100%;
        transition: border-color 0.3s ease;
    }

    .matched-profile-cmp .title-row-bg {
        background: linear-gradient(to right, #e2e8f0, #edf2f7);
    }

    .matched-profile-cmp .profile-select:focus {
        outline: none;
        border-color: #3182ce;
        box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.1);
    }

    .matched-profile-cmp .profile-item-title {
        font-weight: 600;
        color: #2d3748;
        text-transform: uppercase;
        font-size: 18px;
        text-align: left;
    }

    .matched-profile-head {
        position: sticky;
        top: 0;
        z-index: 10;
        background-color: #e2e8f0;
    }

    .matched-profile-cmp tr {
        background-color: #f0f4f8;
    }
</style>
<div class="matched-profile-cmp">
    <table>
        <thead class="matched-profile-head">
            <tr class="head-row-bg">
                <th></th>
                <th>
                    <div class="select-container">
                        <select class="form-select profile-select" id="selectCard1">
                            <option value="profile1" selected>Profile 1</option>
                            <option value="profile2">Profile 2</option>
                            <option value="profile3">Profile 3</option>
                            <option value="profile4">Profile 4</option>
                        </select>
                    </div>
                </th>
                <th>
                    <div class="select-container">
                        <select class="form-select profile-select" id="selectCard2">
                            <option value="profile1">Profile 1</option>
                            <option value="profile2" selected>Profile 2</option>
                            <option value="profile3">Profile 3</option>
                            <option value="profile4">Profile 4</option>
                        </select>
                    </div>
                </th>
                <th>
                    <div class="select-container">
                        <select class="form-select profile-select" id="selectCard3">
                            <option value="profile1">Profile 1</option>
                            <option value="profile2">Profile 2</option>
                            <option value="profile3" selected>Profile 3</option>
                            <option value="profile4">Profile 4</option>
                        </select>
                    </div>
                </th>
                <th>
                    <div class="select-container">
                        <select class="form-select profile-select" id="selectCard4">
                            <option value="profile1">Profile 1</option>
                            <option value="profile2">Profile 2</option>
                            <option value="profile3">Profile 3</option>
                            <option value="profile4" selected>Profile 4</option>
                        </select>
                    </div>
                </th>
            </tr>
            <tr class="head-row-bg">
                <th></th>
                <th>
                    <img src="https://placehold.co/100x100" alt="Profile Picture" class="profile-pic" />
                    <h4>John Doe</h4>
                </th>
                <th>
                    <img src="https://placehold.co/100x100" alt="Profile Picture" class="profile-pic" />
                    <h4>Jane Smith</h4>
                </th>
                <th>
                    <img src="https://placehold.co/100x100" alt="Profile Picture" class="profile-pic" />
                    <h4>Alex Johnson</h4>
                </th>
                <th>
                    <img src="https://placehold.co/100x100" alt="Profile Picture" class="profile-pic" />
                    <h4>Emily Davis</h4>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="title-row-bg">
                <td></td>
                <td class="profile-item-title" colspan="4">
                    Contact Information
                </td>
            </tr>
            <tr>
                <td class="profile-header">Email</td>
                <td>john.doe@example.com</td>
                <td>jane.smith@example.com</td>
                <td>alex.johnson@example.com</td>
                <td>emily.davis@example.com</td>
            </tr>
            <tr>
                <td class="profile-header">Phone No.</td>
                <td>(123) 456-7890</td>
                <td>(234) 567-8901</td>
                <td>(345) 678-9012</td>
                <td>(456) 789-0123</td>
            </tr>
            <tr>
                <td class="profile-header">MmMR ID</td>
                <td>MmMR ID: 001</td>
                <td>MmMR ID: 002</td>
                <td>MmMR ID: 003</td>
                <td>MmMR ID: 004</td>
            </tr>
            <tr class="title-row-bg">
                <td></td>
                <td class="profile-item-title" colspan="4">Personal Details</td>
            </tr>
            <tr>
                <td class="profile-header">Age</td>
                <td>25-30</td>
                <td>28-32</td>
                <td>30-35</td>
                <td>27-31</td>
            </tr>
            <tr>
                <td class="profile-header">Height</td>
                <td>5'6" - 5'8"</td>
                <td>5'8" - 5'10"</td>
                <td>5'5" - 5'7"</td>
                <td>5'9" - 6'0"</td>
            </tr>
            <tr>
                <td class="profile-header">Weight</td>
                <td>130-150 lbs</td>
                <td>140-160 lbs</td>
                <td>120-140 lbs</td>
                <td>150-170 lbs</td>
            </tr>
            <tr>
                <td class="profile-header">Location</td>
                <td>California, Los Angeles</td>
                <td>New York, New York City</td>
                <td>Texas, Austin</td>
                <td>Florida, Miami</td>
            </tr>
            <tr class="title-row-bg">
                <td></td>
                <td class="profile-item-title" colspan="4">Lifestyle Choices</td>
            </tr>
            <tr>
                <td class="profile-header">Pet Friendly</td>
                <td>Yes</td>
                <td>No</td>
                <td>No</td>
                <td>Yes</td>
            </tr>
            <tr>
                <td class="profile-header">Want to have Children</td>
                <td>Yes</td>
                <td>No</td>
                <td>No</td>
                <td>Yes</td>
            </tr>
            <tr>
                <td class="profile-header">Want to get Married</td>
                <td>Yes</td>
                <td>No</td>
                <td>No</td>
                <td>Yes</td>
            </tr>
            <tr>
                <td class="profile-header">Have Children</td>
                <td>Yes</td>
                <td>No</td>
                <td>No</td>
                <td>Yes</td>
            </tr>
            <tr>
                <td class="profile-header">Previous Marriage</td>
                <td>Yes</td>
                <td>No</td>
                <td>No</td>
                <td>Yes</td>
            </tr>
            <tr class="title-row-bg">
                <td></td>
                <td class="profile-item-title" colspan="4">Health</td>
            </tr>
            <tr>
                <td class="profile-header">HIV Status</td>
                <td>Negative</td>
                <td>Positive</td>
                <td>Negative</td>
                <td>Negative</td>
            </tr>
            <tr class="title-row-bg">
                <td></td>
                <td class="profile-item-title" colspan="4">
                    Partner Expectations
                </td>
            </tr>
            <tr>
                <td class="profile-header">Qualities</td>
                <td>Kind, humorous</td>
                <td>Loyal, ambitious</td>
                <td>Adventurous, witty</td>
                <td>Caring, honest</td>
            </tr>
            <tr>
                <td class="profile-header">Negotiable Requirements</td>
                <td>Flexible career</td>
                <td>Travel-friendly</td>
                <td>Job location</td>
                <td>Relocation</td>
            </tr>
            <tr>
                <td class="profile-header">Non-Negotiable Requirements</td>
                <td>Flexible career</td>
                <td>Travel-friendly</td>
                <td>Job location</td>
                <td>Relocation</td>
            </tr>
            <tr>
                <td class="profile-header">Partner Sexual Position</td>
                <td>Top</td>
                <td>Asexual</td>
                <td>Bottom</td>
                <td>Versatile</td>
            </tr>
            <tr class="title-row-bg">
                <td></td>
                <td class="profile-item-title" colspan="4">Beliefs & Values</td>
            </tr>
            <tr>
                <td class="profile-header">Religion</td>
                <td>Christian</td>
                <td>None</td>
                <td>Hindu</td>
                <td>None</td>
            </tr>
            <tr>
                <td class="profile-header">Ideology</td>
                <td>Right-wing</td>
                <td>Liberal</td>
                <td>Moderate</td>
                <td>Libertarian</td>
            </tr>
            <tr>
                <td class="profile-header">Political Ideology</td>
                <td>Right-wing</td>
                <td>Left-wing</td>
                <td>Centrist</td>
                <td>Libertarian</td>
            </tr>
            <tr class="title-row-bg">
                <td></td>
                <td class="profile-item-title" colspan="4">Preferences</td>
            </tr>
            <tr>
                <td class="profile-header">Food Preference</td>
                <td>Veg</td>
                <td>Non-Veg</td>
                <td>Vegan</td>
                <td>Veg</td>
            </tr>
            <tr>
                <td class="profile-header">Lifestyle</td>
                <td>Active</td>
                <td>Urban</td>
                <td>Minimalist</td>
                <td>Adventurous</td>
            </tr>
            <tr>
                <td class="profile-header">Degree of Openness</td>
                <td>Out to family</td>
                <td>Out to all</td>
                <td>Out to close friends</td>
                <td>closest</td>
            </tr>
            <tr>
                <td class="profile-header">Hobbies</td>
                <td>Reading, Hiking</td>
                <td>Cooking, Music</td>
                <td>Painting, Yoga</td>
                <td>Surfing, Travel</td>
            </tr>
            <tr class="title-row-bg">
                <td></td>
                <td class="profile-item-title" colspan="4">
                    Additional Information
                </td>
            </tr>
            <tr>
                <td class="profile-header">Additional Notes</td>
                <td>Looking for a committed partner</td>
                <td>Enjoys city life</td>
                <td>Seeks spiritual connection</td>
                <td>Loves beach lifestyle</td>
            </tr>
        </tbody>
    </table>
</div>