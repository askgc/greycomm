//
//  FAQViewController.swift
//  UserLoginAndRegistration
//
//  Created by Jordan Esty on 4/14/16.
//  Copyright © 2016 Jordan Esty. All rights reserved.
//

import UIKit

class FAQViewController: UIViewController {

    @IBOutlet weak var FText: UILabel!
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        

        
        let Fasd = "1. GreyComm Studios reserves the right to reject requests for studio space and <br> change reservations at anytime. <br> <br> 2. If your request is granted and you/your group is late <i> without properly notifying <br> GreyComm Management </i> your reservation will be lost. <br> <br>if you do not clean up the studio after you are finished with your shoot you may <br> lose the ability to make reservations for the rest of the semester. <br> <br>4. GreyComm Studios is not responsible for lost footage or technical difficulties. <br> We will assist you in anyway possible.  Although rare, technology can fail, therefore <br>you are working at your own risk"
        
        FText.text = Fasd

        // Do any additional setup after loading the view.
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    

    /*
    // MARK: - Navigation

    // In a storyboard-based application, you will often want to do a little preparation before navigation
    override func prepareForSegue(segue: UIStoryboardSegue, sender: AnyObject?) {
        // Get the new view controller using segue.destinationViewController.
        // Pass the selected object to the new view controller.
    }
    */

}
