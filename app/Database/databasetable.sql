    -- users
    CREATE TABLE IF NOT EXISTS users(
        id INT(10) AUTO_INCREMENT PRIMARY KEY,
        uid VARCHAR(120) NOT NULL,
        username VARCHAR(120) NOT NULL,
        email VARCHAR(120) NOT NULL,
        mobile VARCHAR(15) DEFAULT NULL,
        age VARCHAR(15) DEFAULT NULL,
        city VARCHAR(120) DEFAULT NULL,
        profession VARCHAR(255) DEFAULT NULL,
        familybg text DEFAULT NULL,
        password TEXT DEFAULT NULL,
        verify VARCHAR(255) DEFAULT NULL,
        user_type ENUM("admin","user"),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
-- Profiles
    -- Personal Information
    CREATE TABLE IF NOT EXISTS personal_information(
        id INT(10) AUTO_INCREMENT PRIMARY KEY,
        uid VARCHAR(120) NOT NULL,
        dob VARCHAR(120) DEFAULT NULL,
        height VARCHAR(120) DEFAULT NULL,
        weight VARCHAR(120) DEFAULT NULL,
        location VARCHAR(255) DEFAULT NULL,
        complete_address VARCHAR(255) DEFAULT NULL,
        education VARCHAR(255) DEFAULT NULL,
        annual_income VARCHAR(120) DEFAULT NULL,
        food_pref VARCHAR(255) DEFAULT NULL,
        lifestyle_habits VARCHAR(255) DEFAULT NULL,
        religion VARCHAR(255) DEFAULT NULL,
        drinker VARCHAR(255) DEFAULT NULL,
        smoker VARCHAR(255) DEFAULT NULL,
        degree_of_openness VARCHAR(255) DEFAULT NULL,
        ideology VARCHAR(255) DEFAULT NULL,
        hobbies VARCHAR(255) DEFAULT NULL,
        describe_d text DEFAULT NULL,
        past_relationship VARCHAR(255) DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
    -- Reference
      CREATE TABLE IF NOT EXISTS profile_reference(
        id INT(10) AUTO_INCREMENT PRIMARY KEY,
        uid VARCHAR(120) NOT NULL,
        ref1_name VARCHAR(120) DEFAULT NULL,
        ref1_phone VARCHAR(120) DEFAULT NULL,
        ref1_address VARCHAR(255) DEFAULT NULL,
        ref2_name VARCHAR(120) DEFAULT NULL,
        ref2_phone VARCHAR(120) DEFAULT NULL,
        ref2_address VARCHAR(255) DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
    -- social Media link
      CREATE TABLE IF NOT EXISTS profile_social_media_links(
        id INT(10) AUTO_INCREMENT PRIMARY KEY,
        uid VARCHAR(120) NOT NULL,
        instagram_link VARCHAR(255) DEFAULT NULL,
        facebook_link VARCHAR(255) DEFAULT NULL,
        twitter_link VARCHAR(255) DEFAULT NULL,
        linkdin_link VARCHAR(255) DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
     -- Documents
      CREATE TABLE IF NOT EXISTS profile_documents(
        id INT(10) AUTO_INCREMENT PRIMARY KEY,
        uid VARCHAR(120) NOT NULL,
        photo1 VARCHAR(255) DEFAULT NULL,
        photo2 VARCHAR(255) DEFAULT NULL,
        address_proof VARCHAR(255) DEFAULT NULL,
        pan_card VARCHAR(255) DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
    -- Profile Your Mr Right
    CREATE TABLE IF NOT EXISTS profile_your_mr_right(
        id INT(10) AUTO_INCREMENT PRIMARY KEY,
        uid VARCHAR(120) NOT NULL,
        partner_age VARCHAR(15) DEFAULT NULL,
        partner_height VARCHAR(120) DEFAULT NULL,
        partner_weight VARCHAR(120) DEFAULT NULL,
        partner_location VARCHAR(255) DEFAULT NULL,
        partner_education VARCHAR(255) DEFAULT NULL,
        partner_profession VARCHAR(255) DEFAULT NULL,
        partner_annual_income VARCHAR(120) DEFAULT NULL,
        partner_food_pref VARCHAR(255) DEFAULT NULL,
        partner_lifestyle_habits VARCHAR(255) DEFAULT NULL,
        partner_degree_of_openness VARCHAR(255) DEFAULT NULL,
        partner_hobbies VARCHAR(255) DEFAULT NULL,
        partner_religion VARCHAR(255) DEFAULT NULL,
        partner_ideology VARCHAR(255) DEFAULT NULL,
        partner_family_info text DEFAULT NULL,
        partner_describe_d text DEFAULT NULL,
        partner_us_to_consider text DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
    
    -- Members
    CREATE TABLE IF NOT EXISTS member(
        id INT(10) AUTO_INCREMENT PRIMARY KEY,
        uid VARCHAR(120) NOT NULL,
        masterkey VARCHAR(120) DEFAULT NULL,
        mrnmr_id VARCHAR(120) DEFAULT NULL,
        registration_date VARCHAR(120) DEFAULT NULL,
        first_name VARCHAR(120) DEFAULT NULL,
        last_name VARCHAR(120) DEFAULT NULL,
        membership_status VARCHAR(255) DEFAULT NULL,
        personal_interview_date VARCHAR(120) DEFAULT NULL,
        days_to_reg_end VARCHAR(120) DEFAULT NULL,
        dob VARCHAR(120) DEFAULT NULL,
        age VARCHAR(120) DEFAULT NULL,
        height VARCHAR(120) DEFAULT NULL,
        weight VARCHAR(120) DEFAULT NULL,
        location VARCHAR(255) DEFAULT NULL,
        education VARCHAR(255) DEFAULT NULL,
        profession VARCHAR(255) DEFAULT NULL,
        annual_income VARCHAR(120) DEFAULT NULL,
        food_pref VARCHAR(255) DEFAULT NULL,
        smoker VARCHAR(255) DEFAULT NULL,
        drinker VARCHAR(255) DEFAULT NULL,
        hobbies VARCHAR(255) DEFAULT NULL,
        religion VARCHAR(255) DEFAULT NULL,
        political_ideology VARCHAR(255) DEFAULT NULL,
        family_info text DEFAULT NULL,
        describe_d text DEFAULT NULL,
        past_relationship VARCHAR(255) DEFAULT NULL,
        photo VARCHAR(255) DEFAULT NULL,
        email VARCHAR(255) DEFAULT NULL,
        phone VARCHAR(255) DEFAULT NULL,
        sexual_position VARCHAR(255) DEFAULT NULL,
        anal_sex_mandatory ENUM("yes","no"),
        out_to_parents ENUM("yes","no"),
        degree_of_openness VARCHAR(255) DEFAULT NULL,
        relationship_type VARCHAR(255) DEFAULT NULL,
        want_to_get_married ENUM('Yes', 'No') DEFAULT NULL,
        want_to_have_children ENUM('Yes', 'No') DEFAULT NULL,
        idea_of_romance VARCHAR(120) DEFAULT NULL,
        social_media_handles VARCHAR(255) DEFAULT NULL,
        pet_friendly ENUM('Yes', 'No') DEFAULT 'No', 
        have_children ENUM('Yes', 'No') DEFAULT 'No', 
        previous_marriage ENUM('Yes', 'No') DEFAULT 'No',
        hiv_status ENUM('Positive', 'Negative') DEFAULT 'Negative',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

    -- My Mr Perfect
    CREATE TABLE IF NOT EXISTS mymrperfect(
        id INT(10) AUTO_INCREMENT PRIMARY KEY,
        uid VARCHAR(120) NOT NULL,
        masterkey VARCHAR(120) DEFAULT NULL,
        mrnmr_id VARCHAR(120) DEFAULT NULL,
        age_range VARCHAR(120) DEFAULT NULL,
        height_range VARCHAR(120) DEFAULT NULL,
        weight_range VARCHAR(120) DEFAULT NULL,
        location VARCHAR(255) DEFAULT NULL,
        food_pref VARCHAR(255) DEFAULT NULL,
        lifestyle VARCHAR(255) DEFAULT NULL,
        degree_of_openness VARCHAR(255) DEFAULT NULL,
        hobbies VARCHAR(255) DEFAULT NULL,
        religion VARCHAR(255) DEFAULT NULL,
        ideology VARCHAR(255) DEFAULT NULL, 
        qualities text DEFAULT NULL, 
        additional text DEFAULT NULL, 
        negotiable_requirement VARCHAR(255) DEFAULT NULL, 
        non_negotiable_requirements VARCHAR(255) DEFAULT NULL, 
        partner_sexual_position VARCHAR(255) DEFAULT NULL,
        political_ideology VARCHAR(255) DEFAULT NULL,
        pet_friendly ENUM('Yes', 'No', 'Does not Matter') DEFAULT 'No',
        want_to_have_children ENUM('Yes', 'No', 'Does not Matter') DEFAULT NULL,
        want_to_get_married ENUM('Yes', 'No', 'Does not Matter') DEFAULT NULL,
        have_children ENUM('Yes', 'No', 'Does not Matter') DEFAULT 'No', 
        previous_marriage ENUM('Yes', 'No', 'Does not Matter') DEFAULT 'No',
        hiv_status ENUM('Positive', 'Negative', 'Does not Matter') DEFAULT 'Negative',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

    -- Event
    CREATE TABLE IF NOT EXISTS events(
        id INT(10) AUTO_INCREMENT PRIMARY KEY,
        uid VARCHAR(120) NOT NULL,
        masterkey VARCHAR(120) DEFAULT NULL,
        event_id VARCHAR(120) DEFAULT NULL,
        event_date VARCHAR(120) DEFAULT NULL,
        event_name VARCHAR(120) DEFAULT NULL,
        participants VARCHAR(120) DEFAULT NULL,
        matches_percentage VARCHAR(120) DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );