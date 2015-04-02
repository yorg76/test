namespace ArchiDox
{
    partial class SearchForm
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;
        private System.Windows.Forms.MainMenu SearchMenu;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (hDcd != null)
            {
                if (reqID != -1)
                    hDcd.CancelRequest(reqID);
                hDcd.Dispose();
                hDcd = null;
            }

            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(SearchForm));
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.code = new System.Windows.Forms.TextBox();
            this.pictureBox2 = new System.Windows.Forms.PictureBox();
            this.mainMenu1 = new System.Windows.Forms.MainMenu();
            this.menuItem1 = new System.Windows.Forms.MenuItem();
            this.menuItem2 = new System.Windows.Forms.MenuItem();
            this.menuItem3 = new System.Windows.Forms.MenuItem();
            this.seal1 = new System.Windows.Forms.TextBox();
            this.seal2 = new System.Windows.Forms.TextBox();
            this.addBtn = new System.Windows.Forms.Button();
            this.endBtn = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // pictureBox1
            // 
            this.pictureBox1.BackColor = System.Drawing.SystemColors.Control;
            this.pictureBox1.Image = ((System.Drawing.Image)(resources.GetObject("pictureBox1.Image")));
            this.pictureBox1.Location = new System.Drawing.Point(0, 0);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(480, 588);
            this.pictureBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            // 
            // code
            // 
            this.code.BackColor = System.Drawing.SystemColors.Control;
            this.code.ForeColor = System.Drawing.SystemColors.Window;
            this.code.Location = new System.Drawing.Point(27, 169);
            this.code.Name = "code";
            this.code.Size = new System.Drawing.Size(414, 41);
            this.code.TabIndex = 7;
            this.code.Text = "Kod pudła ...";
            this.code.Visible = false;
            this.code.TextChanged += new System.EventHandler(this.code_TextChanged);
            this.code.GotFocus += new System.EventHandler(this.clearSearchBox);
            this.code.KeyDown += new System.Windows.Forms.KeyEventHandler(this.scanFinished);
            // 
            // pictureBox2
            // 
            this.pictureBox2.BackColor = System.Drawing.SystemColors.Control;
            this.pictureBox2.Image = ((System.Drawing.Image)(resources.GetObject("pictureBox2.Image")));
            this.pictureBox2.Location = new System.Drawing.Point(78, 62);
            this.pictureBox2.Name = "pictureBox2";
            this.pictureBox2.Size = new System.Drawing.Size(324, 58);
            this.pictureBox2.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            // 
            // mainMenu1
            // 
            this.mainMenu1.MenuItems.Add(this.menuItem1);
            // 
            // menuItem1
            // 
            this.menuItem1.MenuItems.Add(this.menuItem2);
            this.menuItem1.MenuItems.Add(this.menuItem3);
            this.menuItem1.Text = "Menu";
            // 
            // menuItem2
            // 
            this.menuItem2.Text = "Wyloguj";
            this.menuItem2.Click += new System.EventHandler(this.exitApp);
            // 
            // menuItem3
            // 
            this.menuItem3.Text = "Przyjęcie na mag.";
            this.menuItem3.Click += new System.EventHandler(this.warehouseReception);
            // 
            // seal1
            // 
            this.seal1.BackColor = System.Drawing.SystemColors.Control;
            this.seal1.ForeColor = System.Drawing.SystemColors.Window;
            this.seal1.Location = new System.Drawing.Point(27, 274);
            this.seal1.Name = "seal1";
            this.seal1.Size = new System.Drawing.Size(414, 41);
            this.seal1.TabIndex = 13;
            this.seal1.Text = "Kod plomby 1";
            this.seal1.Visible = false;
            this.seal1.TextChanged += new System.EventHandler(this.seal1_TextChanged);
            // 
            // seal2
            // 
            this.seal2.BackColor = System.Drawing.SystemColors.Control;
            this.seal2.ForeColor = System.Drawing.SystemColors.Window;
            this.seal2.Location = new System.Drawing.Point(27, 327);
            this.seal2.Name = "seal2";
            this.seal2.Size = new System.Drawing.Size(414, 41);
            this.seal2.TabIndex = 16;
            this.seal2.Text = "Kod plomby 2";
            this.seal2.Visible = false;
            this.seal2.TextChanged += new System.EventHandler(this.textBox1_TextChanged);
            // 
            // addBtn
            // 
            this.addBtn.Location = new System.Drawing.Point(150, 420);
            this.addBtn.Name = "addBtn";
            this.addBtn.Size = new System.Drawing.Size(144, 40);
            this.addBtn.TabIndex = 17;
            this.addBtn.Text = "Dodaj";
            // 
            // endBtn
            // 
            this.endBtn.Location = new System.Drawing.Point(150, 483);
            this.endBtn.Name = "endBtn";
            this.endBtn.Size = new System.Drawing.Size(144, 40);
            this.endBtn.TabIndex = 18;
            this.endBtn.Text = "Zakończ";
            // 
            // SearchForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(192F, 192F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Dpi;
            this.ClientSize = new System.Drawing.Size(480, 588);
            this.Controls.Add(this.endBtn);
            this.Controls.Add(this.addBtn);
            this.Controls.Add(this.seal2);
            this.Controls.Add(this.seal1);
            this.Controls.Add(this.pictureBox2);
            this.Controls.Add(this.code);
            this.Controls.Add(this.pictureBox1);
            this.KeyPreview = true;
            this.Location = new System.Drawing.Point(0, 0);
            this.Menu = this.mainMenu1;
            this.Name = "SearchForm";
            this.Text = "ArchiDox for Windows";
            this.TopMost = true;
            this.WindowState = System.Windows.Forms.FormWindowState.Maximized;
            this.KeyDown += new System.Windows.Forms.KeyEventHandler(this.Form1_KeyDown);
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.PictureBox pictureBox1;
        private System.Windows.Forms.TextBox code;
        private System.Windows.Forms.PictureBox pictureBox2;
        private System.Windows.Forms.MainMenu mainMenu1;
        private System.Windows.Forms.MenuItem menuItem1;
        private System.Windows.Forms.MenuItem menuItem2;
        private System.Windows.Forms.MenuItem menuItem3;
        private System.Windows.Forms.TextBox seal1;
        private System.Windows.Forms.TextBox seal2;
        private System.Windows.Forms.Button addBtn;
        private System.Windows.Forms.Button endBtn;
    }
}

